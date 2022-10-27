<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Direction;
use App\Models\User;
use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $companies = Company::where('user_id', $this->user->id)->get();
        $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
    
        $this->content = view('main.dashboard')->with([
            'companies'=> $companies,
            'company' => $company,
            //'directions' => $directions
            ])->render();
        return $this->renderOutput();
    }
}
