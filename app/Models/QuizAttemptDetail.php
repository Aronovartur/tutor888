<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttemptDetail extends Model
{
    use HasFactory;

    protected $fillable=['attempt_id', 'question','chosen_answer', 'correct_answer'];



    public function attempt(){
        return $this->belongsTo(QuizAttempt::class, 'attempt_id');

    }
}
