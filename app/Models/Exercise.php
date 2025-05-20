<?php

namespace App\Models;

use App\Observers\ExerciseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ExerciseObserver::class)]
class Exercise extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseFactory> */
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'content',
        'require_xml',
        'require_xsd',
        'require_xslt',
        'end_at'
    ];

    protected $casts = [
        'require_xml' => 'boolean',
        'require_xsd' => 'boolean',
        'require_xslt' => 'boolean',
        'end_at' => 'datetime'
    ];





    //relationships
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function groups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'groups_exercises');
    }

}
