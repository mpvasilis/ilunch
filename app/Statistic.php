<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }


    protected $fillable = [
        'student_id',
        'menu_id',
        'membership_id',
        'created_at'
    ];
}