<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicalclinic extends Model
{
    use HasFactory;
    
    const ACTIVE = '1';
    const INACTIVE = '0';

    protected $fillable = [
        'clinicName',
        'clinicAddress',
        'clinicOgrn',
        'clinicEmail',
        'clinicPhone',
        'company_id',
    ];
}
