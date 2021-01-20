<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'content', 'objective_id'
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class, 'objective_id', 'id');
    }

    //get Topic Through Obj
    public function getTopicAttribute()
    {
        return $this->objective->topic;
    }
}
