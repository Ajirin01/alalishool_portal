<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $with = [
        'students.user',
        'students',
        'teacher_classes',
        'results'
    ];

    protected $touch = [
        'teacher_classes'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function students(){
        return $this->hasMany('App\Models\Student');
    }

    public function teacher_classes(){
        return $this->hasMany('App\Models\TeacherClasses');
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }
}
