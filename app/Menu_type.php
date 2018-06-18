<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_type extends Model
{
    public function meals()
    {
        return $this->hasMany('App\Menu_meals', 'id', 'membership_id');
    }
}
