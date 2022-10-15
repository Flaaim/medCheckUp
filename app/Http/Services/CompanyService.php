<?php

namespace App\Http\Services;

use App\Models\Company;

class CompanyService {

    public function save($request, $model){
        $request->merge(['user_id' => $request->user()->id]);
        $request->merge(['status' => $this->setStatus()]);
        $model->fill($request->only($model->getFillable()));
        $model->save();
        return true;
    }

    public function setStatus(){
        if(count(Company::all()) == 0) {
            $status = "1";
        }elseif(count(Company::all()) != 0 and Company::all()->contains('status', "1")){
            $status = "1";
        } else {
            $status = "0";
        }
        return $status;
    }

    public function changeCompany($request){
        Company::where('status', '1')->update(['status' => '0']);
        Company::where('id', $request->id)->update(['status' =>'1']);
        return true;
    }


}