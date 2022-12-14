<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;
use App\Models\HarmfulFactor;
use App\Models\Medicalclinic;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Str;

class Company extends Model
{
    use HasFactory;

    const ACTIVE = '1';
    const INACTIVE = '0';
    
    protected $fillable = [
        'name', 
        'type_of_ownership',
        'economic_activity',
        'okved',
        'phone',
        'email',
        'profession',
        'fullname',
        'user_id',
        'status',
    ];

    public function phone():Attribute
    {
        return Attribute::make(
            set: fn ($value) => '+7'.$value,
            get: fn ($value) => Str::substr($value, 2),
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function directions()
    {
        return $this->hasMany(Direction::class);
    }

    public function harmfulFactors()
    {
        return $this->hasMany(HarmfulFactor::class);
    }

    public function medicalclinic()
    {
        return $this->hasOne(Medicalclinic::class);
    }
}
