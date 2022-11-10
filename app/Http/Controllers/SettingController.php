<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HarmfulfactorsImport;
use App\Models\Company;
use App\Models\Harmfulfactor;

class SettingController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function index(Request $request){
        
        $company = Company::where('user_id', $request->user()->id)->where('status', '1')->first();
        
        $harmfulFactors = Harmfulfactor::where('company_id', $company->id)->get();
        $this->content = view('main.settings')->with(['company' => $company, 'harmfulFactors' => $harmfulFactors])->render();
        return $this->renderOutput();
    }

    public function import(Request $request){
            $request->validate([
                'harmfulFactors' => 'required|file',
            ]);
            $company = Company::where('user_id', $request->user()->id)->where('status', '1')->first();  
            Excel::import(new HarmfulfactorsImport($company->id), $request->file('harmfulFactors'));
            return redirect()->back()->with('success', 'Файл успешно добавлен');
    }
    public function deleteAll(Company $company){
        Harmfulfactor::where('company_id', $company->id)->delete();
        return redirect()->back()->with('success', 'Файл успешно удален');
    }
}
