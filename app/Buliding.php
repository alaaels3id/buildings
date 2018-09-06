<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Buliding extends Model
{
    use SoftDeletes;
    protected $table = "bulidings";
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'bu_name', 'bu_price', 'bu_type','bu_rooms', 'bu_rent', 'bu_small_dis', 'bu_gov', 'year',
        'bu_square', 'bu_meta', 'bu_langtude','bu_latitude', 'bu_large_dis', 'bu_status', 'bu_image',
    ];

    public function users()
    { 
        return $this->belongsToMany(User::class)->withTimestamps(); 
    }
    
    public function admins()
    { 
        return $this->belongsToMany(Admin::class)->withTimestamps(); 
    }

    // Scopes;

    public function scopeStatus($query)
    {
        return $query->where('bu_status', 'Active');
    }

    public function scopeRandoms($query, $count)
    {
        return $query->take($count)->orderBy(DB::raw('RAND()'))->get();
    }
}
