<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    public function schedule_item()
    {
        return $this->hasOne('App\Schedule_Item', 'id', 'schedule_id');
    }

    const UPDATED_AT = null;
    public $timestamps = [ "created_at" ]; 
    protected $fillable = [
        'student_id',
        'schedule_id',
        'membership_id',
        'created_at'
    ];
}