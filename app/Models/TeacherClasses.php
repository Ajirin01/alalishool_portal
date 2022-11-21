<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'classes_id',
        'classes_name',
        'teacher_name'
    ];

    protected $hidden = [
        'teacher_id',
        // 'classes_id',
        'created_at',
        'updated_at'
    ];

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }

    public function classes(){
        return $this->belongsTo('App\Models\Classes');
    }
}
