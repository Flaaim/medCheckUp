<?php

namespace App\Http\Services;
use App\Models\Company;

class DirectionService 
{
    
    public function save($request, $model){
        $company = Company::where('status', '1')->first();
        $request->merge(['company_id' => $company->id]);
        $request->merge(['filename' => $request->fullname]);
        $model->fill($request->all());
        $model->save();
        return true;
    }
}