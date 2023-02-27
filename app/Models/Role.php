<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
    ];
}
