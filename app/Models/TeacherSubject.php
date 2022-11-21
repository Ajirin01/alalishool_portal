<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'teacher_name',
        'subject_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        // 'subject_id',
        'teacher_id'
    ];

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }
}
