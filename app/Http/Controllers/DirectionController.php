<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DirectionRequest;
use App\Models\Direction;

class DirectionController extends Controller
{
    public function create(Request $request){
        $companies = $request->user()->company;
        return view('directions.create', ['companies' => $companies]);
    }

    public function store(Request $request){
        dd($request->all());
        $direction = new Direction();
        $direction->fill($request->only($direction->getFillable()));
        $direction->save();
        return redirect()->route('home')->with('success', 'Направление успешно создано');
    }
}
