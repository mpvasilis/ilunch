<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{   
    const UPDATED_AT = null;
    public $timestamps = [ "created_at" ]; 
    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    public function schedule_item()
    {
        return $this->hasOne('App\Schedule_item', 'id', 'schedule_id');
    }

    protected $fillable = [
        'student_id',
        'schedule_id',
        'rating',
        'comment',
        'filename',
        'date',
        'created_at'
    ];
}
