<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Medicalclinic;
use App\Http\Requests\ClinicRequest;
use App\Http\Services\ClinicService;

class MedicalclinicController extends BaseController
{
    protected $service;

    public function __construct(ClinicService $service){
        parent::__construct();
        $this->service = $service;
    }

    public function create(){
        $this->content = view('settings.clinic.create');
        return $this->renderOutput();
    }

    public function store(ClinicRequest $request){
        $this->service->save($request, new Medicalclinic, $this->company);
        return redirect()->route('settings')->with('success', 'Медицинское учреждение успешно добавлено');
    }

    public function edit(Medicalclinic $medclinic){
        $this->content = view('settings.clinic.edit')->with('medclinic', $medclinic)->render();
        return $this->renderOutput();
    }

    public function update(ClinicRequest $request, Medicalclinic $medclinic){
        $this->service->save($request, $medclinic, $this->company);
        return redirect()->route('settings')->with('success', 'Медицинское учреждение успешно изменено');
    }

    public function destroy(Medicalclinic $medclinic){
        $medclinic->delete();
        return redirect()->route('settings')->with('success', 'Медицинское учреждение успешно удалено');
    }
}
