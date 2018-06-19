<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'student_id', 'aem');
    }

    public function memberships()
    {
        return $this->hasMany('App\Membership_assign', 'student_id', 'id');
    }

    public function statistics()
    {
        return $this->hasMany('App\Statistic', 'student_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'student_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function department()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

    public function scopeByDepartment($query, $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }

    public function scopeAem($query, $aem)
    {
        return $query->where('aem', $aem);
    }

    public $timestamps = false;

    protected $fillable = [
        'id',
        'fistname',
        'lastname',
        'AM',
        'AEM',
        'father_name',
        'department_id',
        'semester',
        // add all other fields
    ];

}
