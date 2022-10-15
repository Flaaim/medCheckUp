<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Services\CompanyService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyController extends Controller
{
    protected $service;

    public function __construct(CompanyService $service){
        $this->service = $service;
    }

    public function create(){
        return view('companies.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $this->service->save($request, new Company());
        return redirect()->route('home')->with('success', 'Компания успешно создана');
    }
    public function edit(Company $company){
        return view('companies.edit', ['company' => $company]);
    }
    public function update(Request $request, Company $company){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $this->service->save($request, $company);
        return redirect()->route('home')->with('success', 'Данные компании успешно обновлены');
    }
    public function destroy(Request $request, Company $company){
        $company->delete();
        if(!count(Company::all()) == 0){
            Company::firstOrFail()->update(['status' => '1']);
        }
        return redirect()->route('home')->with('success', 'Компания успешно удалена');  
       
        
        
    }

    public function change(){
        $companies = Company::all()->where('status', '0');
        return view('companies.change', ['companies' => $companies]);
    }
    public function changeCompany(Request $request){
        $this->validate($request, [
            'id' => 'required|integer|min:1'
        ]);
        $this->service->changeCompany($request);

        return redirect()->route('home')->with('success', 'Компания успешно изменена');
        
    }
}
