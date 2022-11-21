<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descripton',
        'start_date',
        'end_date',
        'year_id',
        'term_id',
        'status'
    ];

    protected $with = [
        'exam_papers'
    ];

    protected $touch = [
        'year'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'year_id',
        'term_id'
    ];

    public function exam_papers(){
        return $this->hasMany('App\Models\ExamPaper');
    }

    public function year(){
        return $this->belongsTo('App\Models\Year');
    }

    public function term(){
        return $this->belongsTo('App\Models\Term');
    }
}
