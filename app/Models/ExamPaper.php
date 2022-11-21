<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'classes_id',
        'subject_id',
        'exam_id',
        'instruction',
        'duration',
        'start_time',
        'status'
    ];

    protected $with = [
        'questions',
        'results'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        // 'subject_id',
        // 'exam_id',
        // 'classes_id',
    ];

    public function exam(){
        return $this->belongsTo('App\Models\Exam');
    }

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

    
    public function classes(){
        return $this->belongsTo('App\Models\Classes');
    }

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }
}
