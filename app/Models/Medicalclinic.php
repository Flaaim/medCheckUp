<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicalclinic extends Model
{
    use HasFactory;
    
    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '0';

    protected $fillable = [
        'clinicName',
        'clinicAddress',
        'clinicOgrn',
        'clinicEmail',
        'clinicPhone',
        'company_id',
    ];
}
