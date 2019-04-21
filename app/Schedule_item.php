<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule_item extends Model
{
    public function schedule_item()
    {
        return $this->belongsTo('App\Menu', 'id', 'id');
    }

    public function mealAssigns()
    {
        return $this->hasMany('App\Menu_assign', 'menu_id', 'menu_id');
    }


    

    protected $fillable = ['date','menu_id'];
    public $timestamps = false;
}
