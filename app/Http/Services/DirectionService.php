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
        $request->psycho == "on" ? $this->insertPsychoFactors($model, $request->psychofactors) : "";
        return true;
    }
    public function insertPsychoFactors($model, $psychofactors){
        $model->psychofactors()->sync($psychofactors);
        /*foreach($psychofactors as $factor){
            DB::table('direction_psychofactor')->insert([
                'direction_id' => $model->id,
                'psychofactor_id' => $factor,
            ]);
        }*/
        
    }

    public function getOffSet($page, $limit){
        return ($page != 1) ? ($page * $limit) - $limit : 0;
    }
    
    public function getCompany($user){
        return Company::where('status', '1')->where('user_id', $user->id)->first();
    }
    
    public function getDirections($request, $company, $offSet){
        return ($request->keyword == '') ? 
        Direction::with('psychofactors')->where('company_id', $company->id)
        ->orderBy($request->field, $request->sort)
                ->skip($offSet)->take($request->limit)
                    ->get() : 
        Direction::where('company_id', $company->id)
            ->orderBy($request->field, $request->sort)
                    ->skip($offSet)->take($request->limit)
                        ->where('fullname', 'LIKE', '%'.$request->keyword.'%')
                            ->get();
        
        
    }

            
    
    public function getCountpages($request, $company){
        if($request->keyword == ""){
            $directions = Direction::where('company_id', $company->id)->get();
        } else {
            $directions = Direction::where('company_id', $company->id)
                        ->where('fullname', 'LIKE', '%'.$request->keyword.'%')
                                ->get();
        }

        return ceil(count($directions)/$request->limit);
    } 
}