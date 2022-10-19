<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Services\CompanyService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\ChangeCompanyRequest;

class CompanyController extends Controller
{
    protected $service;

    public function __construct(CompanyService $service){
        $this->service = $service;
    }
    
    public function create(){
        return view('companies.create');
    }
    public function store(CreateCompanyRequest $request){
        $this->service->save($request, new Company());
        return redirect()->route('home')->with('success', 'Компания успешно создана');
    }
    public function edit(Company $company){
        return view('companies.edit', ['company' => $company]);
    }
    public function update(CreateCompanyRequest $request, Company $company){
        $this->service->save($request, $company);
        return redirect()->route('home')->with('success', 'Данные компании успешно обновлены');
    }
    public function destroy(Company $company){
        $company->delete();
        if(!count(Company::all()) == 0){
            Company::firstOrFail()->update(['status' => '1']);
        }
        return redirect()->route('home')->with('success', 'Компания успешно удалена');  
    }
    /**
     * Change company.
     */
    public function change(){
        $companies = Company::where('status', '0')->get();
        return view('companies.change', ['companies' => $companies]);
    }
    public function changeCompany(ChangeCompanyRequest $request){
        $this->service->changeCompany($request);
        return redirect()->route('home')->with('success', 'Компания успешно изменена');
        
    }
}
