<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DirectionRequest;
use App\Models\Direction;
use App\Models\Company;
use App\Http\Services\DirectionService;
use App\Http\Services\CreateWordDirection;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;

class DirectionController extends BaseController
{
    protected $service;
    protected $wordTemplate;

    public function __construct(DirectionService $service, CreateWordDirection $wordTemplate){
        parent::__construct();
        $this->service = $service;
        $this->wordTemplate = $wordTemplate;
    }

    public function create(){
        $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
        $this->content = view('directions.create', ['company' => $company]);
        return $this->renderOutput();
    }

    public function store(DirectionRequest $request){
        $this->service->save($request, new Direction());
        return redirect()->route('home')->with('success', 'Направление успешно создано');
    }

    public function edit(Direction $direction){
        $gender = ['М', 'Ж'];
        $typeOfDirection = ['Предварительный', 'Периодический'];
        $this->content = view('directions.edit', ['direction' => $direction, 'gender' => $gender, 'typeOfDirection' => $typeOfDirection]);
        return $this->renderOutput();
    }

    public function update(DirectionRequest $request, Direction $direction){
        $this->service->save($request, $direction);
        return redirect()->route('home')->with('success', 'Направление успешно изменено');
    }

    public function destroy(Direction $direction){
        $direction->delete();
        return redirect()->route('home')->with('success', 'Направление успешно удалено');
    }



    public function downloadDirection(Direction $direction){
        $template = $this->wordTemplate->createTemplate();
        $pathToSave = $this->wordTemplate->getPathToSave($direction);
        $createWordFile = $this->wordTemplate->setValue($template, $direction);
        $this->wordTemplate->makeDirectory($pathToSave);
        $template->saveAs($pathToSave);
        
        if(Storage::disk('local')->exists($direction->filename.'.docx')){
            return response()->download(storage_path().'\\app\\'.$direction->filename.'.docx')->deleteFileAfterSend(true);;
        }

    }
}