<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership_assign extends Model
{
    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    protected $appends = ['remaining'];

    public function getRemainingAttribute()
    {
        if ($this->membership->type->type == 'DAYS') {
            return $this->membership->type->value - getDays($this->created_at);
        } else if ($this->membership->type->type == 'VISITS') {
            return $this->membership->type->value - Statistic::where('student_id', $this->student->id)->where('membership_id', $this->membership->id)->count();
        } else if ($this->membership->type->type == 'UNTIL') {
            return $this->membership->type->value;
        } else {
            return 'No Limit';
        }
    }

    public $timestamps = false;

}
