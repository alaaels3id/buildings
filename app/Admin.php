<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    
    protected $fillable = [
        'name', 'email', 'password', 'username', 'dob', 'user_image','location'
    ];

    protected $dates = [
        'dob'
    ];
    
    public function setPasswordAttribute($value){ 
    	$this->attributes['password'] = Hash::make($value); 
    }
    
    protected $hidden = [
    	'password', 'remember_token'
    ];

    public function buildings(){ $this->belongsToMany(Buliding::class)->withTimestamps(); }

    public function products(){ 
        return $this->belongsToMany(Product::class)->withTimestamps(); 
    }
}