<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;
use App\Models\HarmfulFactor;

class Company extends Model
{
    use HasFactory;

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function directions(){
        return $this->hasMany(Direction::class);
    }

    public function harmfulfactors(){
        return $this->hasMany(Harmfulfactor::class);
    }
}
