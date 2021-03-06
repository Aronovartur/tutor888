<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    protected $fillable = ['section_id', 'title', 'uid', 'description', 'lesson_type', 'preview', 'sortOrder'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function content()
    {
        return $this->hasOne(Content::class);
    }

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function completions()
    {
        return $this->hasMany(Completion::class);
    }

    public function quizQuestions()
    {
        return $this->hasMany(QuizQuestion::class, 'lesson_id');
    }


}
