<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_type extends Model
{
    public function menu()
    {
        return $this->hasMany('App\Menu', 'type_id', 'id');
    }
}
