<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station_assign extends Model
{   
    const UPDATED_AT = null;
    public $timestamps = [ "created_at" ]; 
    public function facility()
    {
        return $this->hasOne('App\Facillity','id', 'facility_id');
    }

    public function station()
    {
        return $this->hasMany('App\Statistic', 'id', 'station_id');
    }

    protected $fillable = [
        'station_id',
        'facility_id'
    ];
}
