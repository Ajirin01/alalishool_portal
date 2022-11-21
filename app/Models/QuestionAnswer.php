<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer',
        'correct'
    ];

    protected $touch = [
        'question'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }
    
}
