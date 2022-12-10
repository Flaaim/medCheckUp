<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Medicalclinic;

class SettingController extends BaseController
{

    public function index(){
        $this->title = 'Настройки приложения';
        $this->description = "Настройки приложения для выдачи направлений";
        $medclinic = Medicalclinic::where('company_id', $this->user->getActiveCompany()->id)->first();
        $this->content = view('main.settings')->with(['medclinic' => $medclinic])->render();
        return $this->renderOutput();
    }


}
