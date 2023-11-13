<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;


    protected $fillable = [
        'difficulty',
        'question',
        'correct_answer',
        'incorrect_answer1',
        'incorrect_answer2',
        'incorrect_answer3',
    ];
}
