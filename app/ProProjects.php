<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProProjects extends Model
{
    protected $fillable=[
      'title','body','user_id','start_date','end_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function images()
    {
        return $this->hasMany('App\Image','parent_id')->where('type','proproject');
    }
}
