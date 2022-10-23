<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DirectionsExport implements FromCollection, WithHeadings
{
    protected $company;

    public function __construct($company){
        $this->company = $company;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $directions = $this->getDirections();
        return $directions->map(function($item){
            return [
                $item->number,
                $item->date,
                $item->typeOfDirection,
                $item->fullname,
                $item->profession,
                $item->gender,
                $item->department,
                $item->factors,
            ];
        });
    }

    public function headings():array
    {
        return [
            '№ направления',
            'Дата выдачи',
            'Вид направления',
            'Фамилия Имя Отчество',
            'Наименование должности (профессии) или вида работы',
            'Пол',
            'Структурное подразделение',
            'Вредные и (или) опасные производственные факторы. Вид работы',
        ];
    }

    public function getDirections(){
        return $this->company->directions()->get();
    }
}
