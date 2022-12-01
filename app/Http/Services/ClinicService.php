<?php 

namespace App\Http\Services;

use App\Models\Company;

class ClinicService {
    
    public function save($request, $model, $company){
        $request->merge(['company_id' => $company->id]);
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return true;
    }

}