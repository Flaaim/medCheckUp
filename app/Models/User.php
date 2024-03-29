<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Company;
use App\Notifications\CustomResetPasswordNotification;
use App\Notifications\CustomVerifyEmailNotification;
use Illuminate\Support\Str;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmailNotification);
    }

    public function getActiveCompany(): Company
    {
        return Company::where('user_id', $this->id)->where('status', Company::ACTIVE)->first();
    }

    public function setActiveCompany(): Company
    {
        return Company::where('user_id', $this->id)->first()->update(['status' => Company::ACTIVE]); 
    }


    public function verify(): void
    {
        $this->update(['status'=> self::STATUS_ACTIVE]);
    }

    public function setRole(int $role_id, int $user_id): void
    {
        $this->roles()->sync([$role_id, $user_id]);
    }

    public function getConstants(): array
    {
        $reflector = new \ReflectionClass($this);
        $constants = $reflector->getConstants();
        $values = [];

        foreach($constants as $key => $constant){
            if(Str::contains($key, 'STATUS_')){
                $values[$key] = $constant;
            }
        }
        return $values;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($alias)
    {
       foreach($this->roles as $role){
            if($role->alias == $alias){
                return true;
            }
        }
        return false;
    }
}
