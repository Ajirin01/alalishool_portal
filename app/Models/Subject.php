<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $with = [
        // 'teacher_subjects',
        'teacher_subjects.teacher',
        'results'

    ];

    public function teacher_subjects(){
        return $this->hasMany('App\Models\TeacherSubject');
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

}
