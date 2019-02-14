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
    public function type()
    {
        return $this->hasOne('App\Menu_type', 'id', 'type_id');
    }
    protected $appends = ['remaining'];

    public function getRemainingAttribute()
    {
        if ($this->membership->type->type == 'DAYS') {
            $result = $this->membership->type->value - getDays($this->created_at);
        } else if ($this->membership->type->type == 'VISITS') {
            $result = $this->membership->type->value - Statistic::where('student_id', $this->student->id)->where('membership_id', $this->membership->id)->count();
        } else if ($this->membership->type->type == 'UNTIL') {
            $result = $this->membership->type->value;
        } else if ($this->membership->type->type == 'FREE') {
            return 'No Limit';
        }
        if ($result < 0) {
            $result = 'EXPIRED';
        }
        return $result;
    }

    public $timestamps = false;

}
