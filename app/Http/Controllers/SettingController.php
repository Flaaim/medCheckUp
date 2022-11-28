<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class SettingController extends BaseController
{

    public function index(){
        $this->content = view('main.settings')->render();
        return $this->renderOutput();
    }

    public function saveMedicalClinic(Request $request){
        $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
        
    }
}
