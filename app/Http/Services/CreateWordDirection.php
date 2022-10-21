<?php

namespace App\Http\Services;

use Illuminate\Filesystem\Filesystem;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CreateWordDirection {


    protected $files;

    public function __construct(Filesystem $filesystem){
        $this->files = $filesystem;
    }
    
    public function createTemplate()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('/template/template.docx'));
        return $templateProcessor;
    }

    public function getPathToSave($direction){
        $filename = $direction->filename;
        $path = storage_path("app/".$filename.".docx");
        return $path;
    }

    public function setValue($template, $direction){
        $company = Company::where('status', '1')->first();
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
        ));
    }

    public function makeDirectory($pathToSave){
        if(!$this->files->isDirectory(dirname($pathToSave))){
            mkdir(dirname($pathToSave), 0777, true);
        }
        return $pathToSave;     
    }

}