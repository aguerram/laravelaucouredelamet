<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $fillable=[
        'title','content','start_date','end_date','user_id','project_id'
    ];

    protected $casts=[
        'active'=>'boolean'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function images()
    {
        return $this->hasMany('App\Image','parent_id')->where('type','subproject');
    }
}
