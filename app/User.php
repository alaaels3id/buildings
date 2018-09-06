<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'dob', 'user_image','location'
    ];

    protected $dates = [
        'dob'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
    public function getNameAttribute()
    {
        return ucfirst($this->attributes['name']);
    }

    public function user_bu(){ $this->belongsToMany(Buliding::class)->withTimestamps(); }

    public function Orders()
    {
        $this->hasMany(Order::class);
    }
    //SELECT count(*) as count, user_id as user FROM `bulidings` GROUP BY(user_id)
}
