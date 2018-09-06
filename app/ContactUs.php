<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
	protected $table = "contact_uses";
    protected $fillable = [
    	'co_name', 'co_email', 'co_subject', 'co_message', 'co_view', 'co_type', 'image'
    ];
}
