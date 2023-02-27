<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\PsychoFactor;
use Str;

class Direction extends Model
{
    use HasFactory;
    
    const GENDER_MALE = 'М';
    const GENDER_FEMALE = 'Ж';

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
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function psychofactors()
    {
        return $this->belongsToMany(Psychofactor::class);
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
    public function getGender(){
        $reflection = new \ReflectionClass($this);
        $constants = $reflection->getConstants();
        $array = [];

        foreach($constants as $key => $value){
            if (Str::contains($key, 'GENDER_')){
                $array[$key] = $value;
            }
        }
        return $array;
    }
        public function getLastNumber($company){
        return Direction::where('company_id', $company->id)->max('number') + 1;
    }
}
