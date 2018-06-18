<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function type()
    {
        return $this->hasOne('App\Membership_type', 'id', 'type_id');
    }

    public function instances()
    {
        return $this->hasMany('App\Membership_assign', 'membership_id', 'id');
    }

    public function usages()
    {
        return $this->hasMany('App\Statistic', 'membership_id', 'id');
    }

    protected $fillable = [
        'title',
        'type_id',
        'breakfast',
        'lunch',
        'dinner',
        'is_active'
        // add all other fields
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'memberships';
}