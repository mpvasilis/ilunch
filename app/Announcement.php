<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{


    public function scopeActive()
    {
        $date = date('Y-m-d');
        return $this->where('show_until', '>', $date);
    }

    protected $fillable = [
        'title',
        'content',
        'type',
        'show_until'
        // add all other fields
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'announcements';
}
