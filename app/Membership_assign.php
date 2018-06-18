<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership_assign extends Model
{
    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'students_id');
    }
}
