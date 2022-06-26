<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable, SoftDeletes, HasRoles, HasFactory, HasApiTokens, InteractsWithMedia;


    protected $connection = 'pgsql';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'profile_image', 'menuroles', 'agree', 'image',
        'username',
        'first_name',
        'last_name',
        'phone_number',
        'status',
        'banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at', 'expire',
    ];

    protected $attributes = [
        'menuroles' => 'user',
    ];
    //public function getImageAttribute()
    //{
    //  return $this->profile_image;
    // }
    //validar se e um master
    public function isAdmin()
    {
        return $this->master  === true;
    }
    //validar se e um master
    public function isMaster()
    {
        return $this->menuroles  == 'master';
    }
    //pegar o user global na conta
    public function people()
    {
        return $this->belongsTo(People::class, 'id', 'user_id');
    }

    public function getListContas()
    {
        return $this->belongsTo('App\Models\Users_Account', 'id', 'user_id');
    }

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }
}
