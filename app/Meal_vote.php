<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal_vote extends Model
{
    public function meal()
    {
        return $this->hasOne('App\Menu_meal', 'id', 'meal_id');
    }

    const UPDATED_AT = null;
    public $timestamps = [ "created_at" ];
    protected $fillable = [
        'meal_id',
        'stars',
        'date',
        'created_at'
    ];
}
