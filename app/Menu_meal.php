<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_meal extends Model
{

    public function mealType()
    {
        return $this->hasOne('App\Menu_type', 'id', 'type_id');
    }

    protected $fillable = [
        'title',
        'info',
        'type_id',
        'is_active'
        // add all other fields
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'menu_meals';
}