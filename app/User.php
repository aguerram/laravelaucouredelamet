<?php

namespace App;

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
    protected $fillable = [
        'name', 'email', 'password','datene','address','ecole','filiere','niveau'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        //'active'=>'boolean'
    ];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function subprojects()
    {
        return $this->hasMany('App\SubProject');
    }
    public function proprojects()
    {
        return $this->hasMany('App\ProProjects');
    }
    public function entrprojects()
    {
        return $this->hasMany('App\EntrProjects');
    }
    public function votes()
    {
        return $this->hasMany('App\Vote','owner_id');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            $user->entrprojects()->delete();
            $user->proprojects()->delete();
            $user->subprojects()->delete();
            $user->votes()->delete();
            $user->comments()->delete();
            // do the rest of the cleanup...
        });
    }
}
