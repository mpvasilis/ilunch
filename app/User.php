<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

  
    public function student()
    {
        return $this->hasOne('App\Student', 'aem', 'student_id');
    }

    protected $fillable = [
        'name', 'email', 'password', 'student_id', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id';
}
