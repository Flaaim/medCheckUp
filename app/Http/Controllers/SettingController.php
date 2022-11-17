<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends BaseController
{

    public function index(){
        $this->content = view('main.settings')->render();
        return $this->renderOutput();
    }

}
