<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HarmfulRequest;
use App\Http\Controllers\BaseController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HarmfulfactorsImport;
use App\Models\Company;
use App\Models\Harmfulfactor;
use App\Http\Services\SettingService;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class HarmfulController extends BaseController
{
    protected $service;

    public function __construct(SettingService $service){
        $this->service = $service;
        parent::__construct();
    }
    public function index(Request $request){
        $this->title = 'Импорт профессий/факторов';
        $this->description = "Импорт профессий/вредных факторов из таблицы ексель";
        $company = Company::where('user_id', $request->user()->id)->where('status', '1')->first();
        $harmfulFactors = Harmfulfactor::where('company_id', $company->id)->orderBy('profession','ASC')->get();
        $this->content = view('settings.harmful')->with(['company' => $company, 'harmfulFactors' => $harmfulFactors])->render();
        return $this->renderOutput();
    }

    public function import(Request $request){
        $request->validate([
            'harmfulFactors' => 'required|file|mimes:xlsx,xls',
        ]);
        $company = Company::where('user_id', $request->user()->id)->where('status', '1')->first(); 
        $import = new HarmfulfactorsImport($company->id); 
        Excel::import($import, $request->file('harmfulFactors'), \Maatwebsite\Excel\Excel::XLSX);
        return redirect()->back()->with('success', 'Файл успешно добавлен');
    }

    public function deleteAll(Company $company){
        Harmfulfactor::where('company_id', $company->id)->delete();
        return redirect()->back()->with('success', 'Файл успешно удален');
    }


    public function save(HarmfulRequest $request){
            $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
            $this->service->saveFactors($request, $company);
             return response()->json([
                'message' => "Данные успешно добавлены в таблицу!",
            ]);   
    }
        
    public function destroy(Harmfulfactor $factor){
        $factor->delete();
        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
