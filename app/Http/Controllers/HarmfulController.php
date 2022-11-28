<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
        $company = Company::where('user_id', $request->user()->id)->where('status', '1')->first();
        
        $harmfulFactors = Harmfulfactor::where('company_id', $company->id)->get();
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


    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'profession' => 'required|unique',
            'harmfulfactor' => 'required',
        ]);
        if($validator->fails()){
            if($request->ajax()){
                return response()->json([
                    'message' => $validator->getMessageBag()->toArray()
                ]);
        }
        }
        if($request->ajax()){
            $company = Company::where('status', '1')->where('user_id', $this->user->id)->first();
            $this->service->saveFactors($request, $company);
            return response()->json([
                'message' => 'Профессия и факторы успешно добавлены в таблицу',
            ]);
        }
    }
    public function destroy(Harmfulfactor $factor){
        $factor->delete();
        return redirect()->back()->with('success', 'Запись успшено удалена');
    }
}
