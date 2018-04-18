<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user(){
        return $this->hasOne('App/User','student_id');
    }


    public $timestamps = false;

    protected $fillable = [
        'id',
        'fistname'
        // add all other fields
    ];

}
