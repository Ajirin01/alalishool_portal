<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'classes_id',
        'subject_id',
        'exam_paper_id',
        'question'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'exam_id',
        'classes_id',
        'subject_id',
        'exam_paper_id'
    ];

    protected $with = [
        'question_answers'
    ];

    protected $touch = [
        'exam_paper'
    ];

    public function question_answers(){
        return $this->hasMany('App\Models\QuestionAnswer');
    }

    public function exam_paper(){
        return $this->belongsTo('App\Models\ExamPaper');
    }

    public function exam(){
        return $this->belongsTo('App\Models\Exam');
    }

    public function classes(){
        return $this->belongsTo('App\Models\Classes');
    }

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }

}
