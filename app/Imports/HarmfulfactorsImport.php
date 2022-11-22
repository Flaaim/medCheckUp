<?php

namespace App\Imports;

use App\Models\Harmfulfactor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\Validator;

class HarmfulfactorsImport implements ToCollection
{
    protected $company;

    public function __construct($company){
        $this->company = $company;
    }


    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|distinct',
            '*.1' => 'required',
        ])->validate();
        foreach($rows as $row){
            Harmfulfactor::create([
                'profession' => $row[0],
                'harmfulfactor' => $row[1],
                'company_id' => $this->company,
            ]);
        }
    }
    
}
