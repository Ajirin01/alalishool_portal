<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classes_id',
        'name'
    ];

    protected $with = [
        'results'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        // 'classes_id',
        'user_id'

    ];


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

    public function classes(){
        return $this->belongsTo('App\Models\Classes');
    }
}
