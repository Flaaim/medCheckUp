<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Direction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'typeOfDirection',
        'fullname',
        'birthdate',
        'gender',
        'department',
        'profession',
        'factors',
        'author_fullname',
        'author_profession',
        'company_id',
        'date',
        'filename',
        'number',
        'psycho_factors',
    ];


    public function company(){
        return $this->belongsTo(Company::class);
    }

    /**
     * Interact birthdate
     * 
     *  @return \Illuminate\Database\Eloquent\Casts\Attribute
     */

    protected function birthdate():Attribute
    {
        return Attribute::make(
            set: fn ($value) => implode('-', array_reverse(explode('.', $value))),
            get: fn($value) => implode('.', array_reverse(explode('-', $value))),
        );
    }

    protected function date():Attribute
    {
        return Attribute::make(
        set: fn($value) => implode('-', array_reverse(explode('.', $value))),
        get: fn($value) => implode('.', array_reverse(explode('-', $value))),
        );
    }
}
