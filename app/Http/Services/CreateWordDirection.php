<?php

namespace App\Http\Services;

use Illuminate\Filesystem\Filesystem;
use App\Models\Company;
use App\Models\MedicalClinic;
use Illuminate\Support\Facades\Storage;

class CreateWordDirection {


    protected $files;

    public function __construct(Filesystem $filesystem){
        $this->files = $filesystem;
    }
    
    public function createTemplate($direction)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $pathToTemplate = $direction->psychofactors->isEmpty() ? '/template/template.docx' : '/template/templateWithPS.docx';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path($pathToTemplate));
        return $templateProcessor;
    }

    public function getPathToSave($direction){
        $filename = $direction->filename;
        $path = storage_path("app/".$filename.".docx");
        return $path;
    }

    public function setValue($template, $direction){
        $clinic = $this->getMedicalClinic($direction);
        
        $company = $direction->company;
        $psyFactor = $this->getPsychoFactors($direction);
        return $template->setValues(array(
            'id' => $direction->number,
            'date' => $direction->date,
            'company_name' => $company->name,
            'company_email' => $company->email,
            'phone' => $company->phone,
            'type_of_ownership' => $company->type_of_ownership,
            'economic_activity' => $company->economic_activity,
            'typeOfDirection' => $direction->typeOfDirection,
            'fullname' => $direction->fullname,
            'birthdate' => $direction->birthdate,
            'gender' => $direction->gender,
            'department' => $direction->department,
            'profession' => $direction->profession,
            'factors' => $direction->factors,
            'author_fullname' => $direction->author_fullname,
            'author_profession' => $direction->author_profession,
            'psycho_factors' => $psyFactor,

            # medical clinic

            'clinicName' => $clinic ? $clinic['clinicName'] : '',
            'clinicAddress' => $clinic ? $clinic['clinicAddress'] : '',
            'clinicOgrn' => $clinic ? $clinic['clinicOgrn'] : '',
            'clinicEmail' => $clinic ? $clinic['clinicEmail'] : '',
            'clinicPhone' => $clinic ? $clinic['clinicPhone'] : ''
        ));
        
    }

    public function getPsychoFactors($direction){
        $psyFactor = "";
        foreach($direction->psychofactors as $factor){
            $psyFactor .= $factor->title." ";
        }
        return $psyFactor;
    }

    public function makeDirectory($pathToSave){
        if(!$this->files->isDirectory(dirname($pathToSave))){
            mkdir(dirname($pathToSave), 0777, true);
        }
        return $pathToSave;     
    }

    public function getMedicalClinic($direction){
        if($direction->company->medicalclinic->status == Medicalclinic::STATUS_ACTIVE){
                $clinic = $direction->company->medicalclinic->toArray();
                return $clinic;
        }
        $clinic = [];
        return $clinic;
    }

}