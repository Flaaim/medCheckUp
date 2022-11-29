<?php

namespace App\Http\Services;

use App\Models\Harmfulfactor;


class SettingService {

    public function saveFactors($request, $company){
        if(count($request->data) == 3){
            return Harmfulfactor::where('id', $request->data['id'])->update([
                'profession' => $request->data['profession'],
                'harmfulfactor' => $request->data['harmfulfactor'],
            ]);
        } else {
            return Harmfulfactor::create([
                'profession' => $request->data['profession'],
                'harmfulfactor' => $request->data['harmfulfactor'],
                'company_id' => $company->id
            ]);
        } 
    }
}