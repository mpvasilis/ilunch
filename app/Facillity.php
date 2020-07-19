<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facillity extends Model
{   
    const UPDATED_AT = null;
    public $timestamps = [ "created_at" ]; 
    public function ratings()
    {
        return $this->hasMany('App\Rating', 'id', 'station_id');
    }

    public function statistics()
    {
        return $this->hasMany('App\Statistic', 'id', 'station_id');
    }
    public function stationassigns()
    {
        return $this->hasMany('App\Statistic', 'id', 'station_id');
    }
    public function name(){
        return "name";
    }

    protected $fillable = [
        'name',
        'info',
        'is_active',
    ];
}
