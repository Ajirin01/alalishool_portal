<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exam_id',
        'subject_id',
        'classes_id',
        'exam_paper_id',
        'year_id',
        'term_id',
        'score',
        'over'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'student_id',
        // 'exam_id',
        // 'subject_id',
        // 'term_id',
        // 'classes_id',
        'exam_paper_id',
        // 'year_id',

    ];

    public function exam_paper(){
        return $this->belongsTo('App\Models\ExamPaper');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function year(){
        return $this->belongsTo('App\Models\Year');
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

    public function term(){
        return $this->belongsTo('App\Models\Term');
    }

}
