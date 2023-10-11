<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

    // protected $with = [
    //     'teacher_classes',
    //     'teacher_subjects'
    // ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function teacher_classes(){
        return $this->hasMany('App\Models\TeacherClasses');
    }

    public function teacher_subjects(){
        return $this->hasMany('App\Models\TeacherSubject');
    }
}
