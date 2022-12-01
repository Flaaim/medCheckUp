<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicalclinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinicName',
        'clinicAddress',
        'clinicOgrn',
        'clinicEmail',
        'clinicPhone',
        'company_id',
    ];
}
