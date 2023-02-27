<?php

namespace App\Http\Services;
use App\Models\Company;
use App\Models\Direction;
use DB;

class DirectionService 
{
    
    public function save($request, $model, $company){ 
        $request->merge(['company_id' => $company->id]);
        $request->merge(['filename' => $request->fullname]);
        $model->fill($request->all());
        $model->save();
        $this->insertPsychoFactors($model, $request->psychofactors);
        return true;
    }
    public function insertPsychoFactors($model, $psychofactors){
        $model->psychofactors()->sync($psychofactors);  
    }

    public function getOffSet($page, $limit){
        return ($page != 1) ? ($page * $limit) - $limit : 0;
    }
    
    public function getCompany($user){
        return Company::where('status', Company::ACTIVE)->where('user_id', $user->id)->first();
    }
    
    public function getDirections($request, $company, $offSet){
        return ($request->keyword == '') ? 
        Direction::with('psychofactors')->where('company_id', $company->id)
        ->orderBy($request->field, $request->sort)
                ->skip($offSet)->take($request->limit)
                    ->get() : 
        Direction::with('psychofactors')->where('company_id', $company->id)
            ->orderBy($request->field, $request->sort)
                    ->skip($offSet)->take($request->limit)
                        ->where('fullname', 'LIKE', '%'.$request->keyword.'%')
                            ->get();   
    }

    public function getDirectionsElements($request, $company){
        if($request->keyword == ""){
            return Direction::where('company_id', $company->id)->get();
        } else {
            return Direction::where('company_id', $company->id)
                        ->where('fullname', 'LIKE', '%'.$request->keyword.'%')
                                ->get();
        }
    }
    public function getCountDirections($directions) {
        return count($directions);
    }
    public function getCountpages($request, $company, $limit){
        $directions = $this->getCountDirections($this->getDirectionsElements($request, $company));
        return ceil($directions/$limit);
    } 

    public function getPageNumber($offSet, $limit){
        return ($offSet / $limit) + 1;
    }

    public function getRows($request, $limit, $pageNumber, $company){
        $directions = $this->getCountDirections($this->getDirectionsElements($request, $company));
        $multiplier = ($pageNumber - 1) * $limit;
        $firstLast = ['first' => 1, 'last' => (int)$limit, 'all' => $directions];
        
        if($pageNumber != 1){
            $firstLast['first'] += $multiplier;
            $firstLast['last'] += $multiplier;
        }
        $firstLast['last'] >= $directions ? $firstLast['last'] = $directions : '';

        return $firstLast;
    }
    public function getLastNumber($company){
        return Direction::where('company_id', $company->id)->max('number') + 1;
    }
}