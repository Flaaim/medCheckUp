<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $users = User::all();
        $this->content = view('admin.dashboard', ['users' => $users])->render();
        return $this->renderOutput();
    }
}
