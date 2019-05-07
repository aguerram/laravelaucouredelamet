<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedName extends Model
{
    protected $table = 'saved_names';
    protected $fillable=[
        'name','user_id'
    ];
}
