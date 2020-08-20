<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Announcement extends Model
{


    public function scopeActive($query)
    {
        $date = date('Y-m-d H:i:s');
        //var_dump($date);
        return $query->where('show_until', '>', $date);
    }

    public function author()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
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
