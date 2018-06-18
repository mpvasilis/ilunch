<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//todo TO BE REMOVED
class Feedback extends Model
{
    protected $table = "feedbacks";
    protected $fillable = [
        'student_id',
        'comment'
    ];
}
