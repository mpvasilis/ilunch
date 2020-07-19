<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership_type extends Model
{
    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

    public function scopeFree($query){
        return $query->where('type','FREE');
    }

    public $timestamps = false;
}
