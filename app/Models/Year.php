<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'year'
    ];

    protected $with = [
        'exams',
        'results'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function exams(){
        return $this->hasMany('App\Models\Exam');
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

    public function terms(){
        return $this->hasMany('App\Models\Term');
    }
}
