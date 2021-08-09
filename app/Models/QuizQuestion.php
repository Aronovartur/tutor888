<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $table = 'quiz_questions';


    protected $fillable=['lesson_id', 'question', 'reference_lesson'];


    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'question_id');
    }
}
