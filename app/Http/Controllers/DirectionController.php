<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DirectionRequest;
use App\Models\Direction;
use App\Models\Company;

class DirectionController extends Controller
{
    public function create(Request $request){
        $company = Company::where('status', '1')->first();
        return view('directions.create', ['company' => $company]);
    }

    public function store(Request $request){
        dd($request->all());
        $direction = new Direction();
        $direction->fill($request->only($direction->getFillable()));
        $direction->save();
        return redirect()->route('home')->with('success', 'Направление успешно создано');
    }
}
