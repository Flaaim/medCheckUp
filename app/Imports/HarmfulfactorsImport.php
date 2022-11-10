<?php

namespace App\Imports;

use App\Models\Harmfulfactor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithUpserts;

class HarmfulfactorsImport implements ToCollection, WithHeadingRow
{
    protected $company;

    public function __construct($company){
        $this->company = $company;
    }


    public function collection(Collection $rows)
    {
        $harmfulFactor = Harmfulfactor::where('company_id', $this->company)->get();
        dump($this->company);
        foreach($rows as $row){

                $harmfulFactor->profession = $row['profession'];
                $harmfulFactor->harmfulfactor = $row['harmfulfactor'];
                $harmfulFactor->company_id = $this->company;
                
        } 
        
    }
}
