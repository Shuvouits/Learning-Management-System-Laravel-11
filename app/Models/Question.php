<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function user(){
       return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function replay(){
        return $this->hasMany(Replay::class, 'question_id', 'id');
    }
}