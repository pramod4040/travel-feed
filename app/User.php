<?php

namespace App;

// use App\Events\UserCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\FollowableTrait;

class User extends Authenticatable
{
    use Notifiable, FollowableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'username',
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

    // protected $dispatchesEvents = [
    //   'created' => UserCreated::class,
    // ];

    public static function checkUserAvailable($email)
    {
       $userExists = User::whereEmail($email)->first();
       return $userExists == null ? 0 : 1;
    }

    public function userprofile()
    {
      return $this->hasOne('App\Models\Userprofile', 'user_id');
    }
}
