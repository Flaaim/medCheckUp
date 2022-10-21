<?php

namespace App\Http\Services;

use App\Models\Company;

class CompanyService {

    public function save($request, $model){
        if(!$model->exists){
            $request->merge(['user_id'=>$request->user()->id]);
            $request->merge(['status' => $this->setStatus($request)]);
        } 
        $model->fill($request->all());
        $model->save();
        return true;
    }

    public function setStatus($request){
        return count(Company::where('user_id', $request->user()->id)->get()) == 0 ? "1" : "0";
    }

    public function changeCompany($request, $user){
        Company::where('status', '1')->where('user_id', $user->id)->update(['status' => '0']);
        Company::where('id', $request->id)->where('user_id', $user->id)->update(['status' =>'1']);
        return true;
    }


}