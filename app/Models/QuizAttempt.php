<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;
    protected $fillable=['user_id','lesson_id','total_attempted','total_correct'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function attemptDetails()
    {
        return $this->hasMany(QuizAttemptDetail::class, 'attempt_id');
    }

}
