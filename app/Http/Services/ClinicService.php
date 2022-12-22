<?php 

namespace App\Http\Services;

use App\Models\Company;
use App\Models\Medicalclinic;

class ClinicService {
    
    public function save($request, $model, $company){
        $request->merge(['company_id' => $company->id]);
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return true;
    }

    public function updateStatus($request, $user){

       if($request->status == 0){
            $status = Medicalclinic::STATUS_ACTIVE;
       } else {
            $status = Medicalclinic::STATUS_INACTIVE;
       }
       $user->getActiveCompany()->medicalclinic()->update(['status' => $status]);
       return $status;
       
        
    }

}