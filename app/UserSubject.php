<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubject extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'user_id', 'subject_id'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_id', 'id');
    }
    // public function Usersubject()
    // {
    //     return $this->belongsTo(Subject::class, 'subject_id', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity', 'userSubject_id', 'subject_id');
    }
}
