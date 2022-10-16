<?php

namespace App\Http\Services;

use App\Models\Company;

class CompanyService {

    public function save($request, $model){
        if(!$model->exists){
            $request->merge(['user_id'=>$request->user()->id]);
            $request->merge(['status' => $this->setStatus()]);
        } 
        $model->fill($request->all());
        $model->save();
        return true;
    }

    public function setStatus(){
        return count(Company::all()) == 0 ? "1" : "0";
    }

    public function changeCompany($request){
        Company::where('status', '1')->update(['status' => '0']);
        Company::where('id', $request->id)->update(['status' =>'1']);
        return true;
    }


}