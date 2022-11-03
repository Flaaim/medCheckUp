<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DirectionsExport implements FromCollection, WithHeadings
{
    protected $company;
    protected $startDate;
    protected $endDate;

    public function __construct(Company $company, Request $request){
        $this->company = $company;
        $this->startDate = Carbon::parse($request->startDate);
        $this->endDate = Carbon::parse($request->endDate);
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
        
        return $this->company
            ->directions()
                ->whereDate('created_at', '>=', $this->startDate)
                ->whereDate('created_at', '<=', $this->endDate)
                    ->get();
    }
}
