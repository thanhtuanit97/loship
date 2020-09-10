<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";

 
    public function order(){
        return $this->hasMany('App\Models\Order','user_id','id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating','user_id', 'id');
    }
    
    
    protected $fillable = [
        'name', 'email', 'password','phone','role','address',
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
}

