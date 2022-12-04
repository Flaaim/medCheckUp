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
        $company = $this->user->getActiveCompany();
        $this->service->save($request, new Medicalclinic, $company);
        return redirect()->route('settings')->with('success', 'Медицинское учреждение успешно добавлено');
    }

    public function edit(Medicalclinic $medclinic){
        $this->content = view('settings.clinic.edit')->with('medclinic', $medclinic)->render();
        return $this->renderOutput();
    }

    public function update(ClinicRequest $request, Medicalclinic $medclinic){
        $company = $this->user->getActiveCompany();
        $this->service->save($request, $medclinic, $company);
        return redirect()->route('settings')->with('success', 'Медицинское учреждение успешно изменено');
    }

    public function destroy(Medicalclinic $medclinic){
        $medclinic->delete();
        return redirect()->route('settings')->with('success', 'Медицинское учреждение успешно удалено');
    }

    public function status(Request $request){
        if($request->ajax()){
            $data = $this->service->updateStatus($request, $this->user);
            return response()->json([
                'status' => $data,
            ]);
        }
    }
}
