<?php

namespace App\Http\Services;

use App\Models\Harmfulfactor;

class SettingService {

    public function saveFactors($request, $company){
        if(count($request->arr) == 3){
            return Harmfulfactor::where('id', $request->arr['0'])->update([
                'profession' => $request->arr['1'],
                'harmfulfactor' => $request->arr['2'],
            ]);
        } else {
            return Harmfulfactor::create([
                'profession' => $request->arr['0'],
                'harmfulfactor' => $request->arr['1'],
                'company_id' => $company->id
            ]);
        }
    }
}