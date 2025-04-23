<?php

namespace App\Models;

use App\Observers\AnswerObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(AnswerObserver::class)]
class Answer extends Model
{
    /** @use HasFactory<\Database\Factories\AnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exercise_id',
        'content',
        'is_correct',
        'note',
    ];

    protected $casts = [
        'is_correct' => 'bool',
    ];


    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }
}
