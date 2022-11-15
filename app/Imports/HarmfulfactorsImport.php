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

        foreach($rows as $row){
            Harmfulfactor::create([
                'profession' => $row['profession'],
                'harmfulfactor' => $row['harmfulfactor'],
                'company_id' => $this->company,
            ]);

              
        } 
        
    }
}
