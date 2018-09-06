<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'bu_id', 'bu_rent', 'user_id', 'fullname', 'mobile', 'email'
    ];

    public function Users()
    {
    	$this->belongsTo(User::class, 'user_id');
    }
}
