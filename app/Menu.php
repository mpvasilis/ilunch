<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menus";
    public $timestamps= false;
  
    public function schedule_items(){
        return $this->hasMany('App\Schedule_items','menu_id','id');
    }

    public function mealAssigns()
    {
        return $this->hasMany('App\Menu_assign', 'menu_id', 'id');
    }

    public function facillity()
    {
        return $this->hasMany('App\Facillity', 'id', 'facility_id');
    }

    public function scopeBreakfast($query)
    {
        return $query->where('menu_assigns.id', '=', 1);
    }

    public function scopeLunch($query)
    {
        return $query->where('menu_assigns.id', '=', 2);
    }

    public function scopeDinner($query)
    {
        return $query->where('menu_assigns.id', '=', 3);
    }

    public function scopesFood($query)
    {
        return $query->join('menu_assigns', 'menu_assigns.menu_id', '=', 'menus.id')->join('menu_meals', 'menu_meals.id', '=', 'menu_assigns.meal_id');
    }
}
