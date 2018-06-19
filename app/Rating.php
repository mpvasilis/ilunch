<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }
}
