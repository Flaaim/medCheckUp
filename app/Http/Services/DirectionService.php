<?php

namespace App\Http\Services;
use App\Models\Company;
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
        foreach($psychofactors as $factor){
            DB::table('direction_psychofactor')->insert([
                'direction_id' => $model->id,
                'psychofactor_id' => $factor,
            ]);
        }
    }

    public function getOffSet($page){
        return ($page != 1) ? ($page * 5) - 5 : 0;
    }
    
    public function getCompany($user){
        return Company::where('status', '1')->where('user_id', $user->id)->first();
    }
    
    public function getDirections($request, $company, $offSet){
        return ($request->keyword == '') ? 
        DB::table('directions')
            ->where('company_id', $company->id)
                ->orderBy($request->field, $request->sort)
                        ->offset($offSet)->limit(5)->get() : 
        DB::table('directions')->where('company_id', $company->id)
                ->where('fullname', 'LIKE', '%'.$request->keyword.'%')->get();
        
        
    }
    
    public function getCountpages($company){
        $directions = DB::table('directions')->where('company_id', $company->id)->get();
        return ceil(count($directions)/5);
    } 
}