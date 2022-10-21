<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Arr;
use App\Models\Company;

class BaseController extends Controller
{
    protected $user;
    protected $template;
    protected $vars;

    public function __construct(){
        $this->template = 'main.main';
        
        $this->middleware(function($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }



    public function renderOutput(){
        $this->vars = Arr::add($this->vars, 'content', $this->content);
        
        return view($this->template)->with($this->vars);
    }
}
