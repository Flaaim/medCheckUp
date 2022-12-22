<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarmfulFactor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'profession',
        'harmfulfactor',
        'company_id',
    ];
}
