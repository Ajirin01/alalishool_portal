<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
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
        'exams',
        'results'
    ];

    public function exams(){
        return $this->hasMany('App\Models\Exam');
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }
}
