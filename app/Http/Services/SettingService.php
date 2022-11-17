<?php

namespace App\Http\Services;

use App\Models\Harmfulfactor;

class SettingService {

    public function updateFactors($request){
       return Harmfulfactor::where('id', $request->arr['0'])->update(['profession' => $request->arr['1']]);
    }

}