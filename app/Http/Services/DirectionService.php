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
}