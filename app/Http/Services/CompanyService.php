<?php

namespace App\Http\Services;

use App\Models\Company;

class CompanyService {

    public function save($request, $model){
       if(!$model->exists){
            $request->merge(['user_id'=>$request->user()->id]);
            $request->merge(['status' => $this->setStatus($request)]);
        } 
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return true;
    }

    public function setStatus($request){
        return count(Company::where('user_id', $request->user()->id)->get()) == 0 ? Company::ACTIVE : Company::INACTIVE;
    }

    public function changeCompany($request, $user){
        $user->companies()->where('status', Company::ACTIVE)->update(['status' => Company::INACTIVE]);
        $user->companies()->where('id', $request->id)->update(['status' => Company::ACTIVE]);
        return true;
    }
}