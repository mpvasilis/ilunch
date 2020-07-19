<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_assign extends Model
{
    public $timestamps= false;

    public function meal()
    {
        return $this->hasOne('App\Menu_meal', 'id', 'meal_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }

    protected $fillable = [
        'meal_id',
        'menu_id',
        'type',
    ];
}