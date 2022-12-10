<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Services\CompanyService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\ChangeCompanyRequest;
use App\Http\Controllers\BaseController;

class CompanyController extends BaseController
{
    protected $service;

    public function __construct(CompanyService $service){
        parent::__construct();
        $this->service = $service;
    }
    
    public function create(){
        $this->title = "Новая компания";
        $this->description = "Форма для создания новой компании";
        $this->content = view('companies.create')->render();
        return $this->renderOutput();
    }
    public function store(CreateCompanyRequest $request){
        $this->service->save($request, new Company());
        return redirect()->route('home')->with('success', 'Компания успешно создана');
    }
    public function edit(Company $company){
        $this->title = "Изменить компанию";
        $this->description = "Форма для изменения компании";
        $this->content = view('companies.edit', ['company' => $company])->render();
        return $this->renderOutput();
    }
    public function update(CreateCompanyRequest $request, Company $company){
        $this->service->save($request, $company);
        return redirect()->route('home')->with('success', 'Данные компании успешно обновлены');
    }
    public function destroy(Company $company){
        $company->delete();
        if($this->user->companies->isNotEmpty()){
            $this->user->setActiveCompany();
        }
        return redirect()->route('home')->with('success', 'Компания успешно удалена');  
    }
    
    /**
     * Change company.
     */

    public function change(){
        $this->title = "Сменить компанию";
        $this->description = "Форма для смены компании";
        $companies = $this->user->companies()->where('status', '0')->get();
        $this->content = view('companies.change', ['companies' => $companies]);
        return $this->renderOutput();
    }
    public function changeCompany(ChangeCompanyRequest $request){
        $this->service->changeCompany($request, $this->user);
        return redirect()->route('home')->with('success', 'Компания успешно изменена');  
    }
}
