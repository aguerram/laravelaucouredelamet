<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
        'title','content','start_date','end_date'
    ];
    public function images()
    {
        return $this->hasMany('App\Image','parent_id')->where('type','project');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','parent_id');
    }
    public function subprojects(){
        return $this->hasMany('App\SubProject');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($project) { // before delete() method call this
            $project->subprojects()->delete();
        });
    }
}
