<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\DirectionRequest;
use App\Models\Direction;
use App\Models\Company;
use App\Http\Services\DirectionService;
use App\Http\Services\CreateWordDirection;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;
use DB;
use App\Exports\DirectionsExport;
use Excel;
use App\Models\Psychofactor;
use App\Models\Harmfulfactor;

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
        $this->title = 'Новое направление на медицинский осмотр';
        $this->description = "Создать новое направление на медицинский осмотр";
        $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
        $psychofactors = DB::table('psychofactors')->get();
        $currentNumber = $this->service->getLastNumber($company) + 1;
        $harmfulFactors = HarmfulFactor::where('company_id', $company->id)->get();
        
        $this->content = view('directions.create', ['company' => $company, 'psychofactors' => $psychofactors, 'currentNumber' => $currentNumber, 'harmfulFactors' => $harmfulFactors]);
        return $this->renderOutput();
    }

    public function store(DirectionRequest $request){
        $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
        $this->service->save($request, new Direction(), $company);
        return redirect()->route('home')->with('success', 'Направление успешно создано');
    }

    public function edit(Direction $direction){
        $this->title = 'Изменить направление на медицинский осмотр';
        $this->description = "Изменение существующего направления на медицинский осмотр";
        $company = $this->user->getActiveCompany();
        $gender = ['М', 'Ж'];
        $typeOfDirection = ['Предварительный', 'Периодический'];
        $oldPsychofactors = $direction->psychofactors;
        $psychofactors = Psychofactor::all();
        $harmfulFactors = $company->harmfulfactors;
        $this->content = view('directions.edit', ['direction' => $direction, 'gender' => $gender, 'typeOfDirection' => $typeOfDirection, 'psychofactors'=> $psychofactors, 'oldPsychofactors' => $oldPsychofactors, 'harmfulFactors' => $harmfulFactors]);
        return $this->renderOutput();
    }

    public function update(DirectionRequest $request, Direction $direction){
        $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
        $this->service->save($request, $direction, $company);
        return redirect()->route('home')->with('success', 'Направление успешно изменено');
    }


    public function destroy(Direction $direction){
        $direction->delete();
        return redirect()->route('home')->with('success', 'Направление успешно удалено');
    }

    public function downloadDirection(Direction $direction){
        $template = $this->wordTemplate->createTemplate($direction);
        $pathToSave = $this->wordTemplate->getPathToSave($direction);
        $createWordFile = $this->wordTemplate->setValue($template, $direction);
        $this->wordTemplate->makeDirectory($pathToSave);
        $template->saveAs($pathToSave);
        
        if(Storage::disk('local')->exists($direction->filename.'.docx')){
            return response()->download(storage_path().'\\app\\'.$direction->filename.'.docx')->deleteFileAfterSend(true);
        }

    }

    public function showDirections(Request $request){
            if($request->ajax()){
                $limit = $request->limit;
                $page = $request->page;
                $offSet = $this->service->getOffSet($page, $limit);
                $company = $this->service->getCompany($this->user);
                $directions = $this->service->getDirections($request, $company, $offSet);
                $countPages = $this->service->getCountPages($request, $company, $limit);
                $pageNumber = $this->service->getPageNumber($offSet, $limit);
                $countRows = $this->service->getRows($request, $limit, $pageNumber, $company);

            
                return response()->json([
                    'directions' => $directions,
                    'countpages' => $countPages,
                    'limit' => (int) $request->limit,
                    'firstLast' => $countRows,
                ]);
            }
    }


    public function loadfactors(Request $request){
        if($request->ajax()){
            $factors = Psychofactor::all();
            return response()->json([
                'factors' => $factors
            ], 200);
        }
    }

    public function loadProfessions(Request $request){
        if($request->ajax()){
            $harmFulfactor = Harmfulfactor::where('profession', $request->profession)->first();
            return response()->json([
                'harmFulfactor' => $harmFulfactor
            ]);
        }
    }

    public function showExport(Company $company){
        $this->title = 'Экспорт данных';
        $this->description = "Экспорт направлений на медицинский осмотр в эксель";
        $this->content = view('directions.export', ['company' => $company])->render();
        return $this->renderOutput();

    }

    public function export(Request $request, Company $company){
        $export = new DirectionsExport($company, $request);
       
        return Excel::download($export, 'export.xlsx');
        
    }
}