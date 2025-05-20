<?php

namespace App\Models;

use App\Observers\AnswerObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'xml_content',
        'xsd_content',
        'xslt_content',
        'note',
    ];

    public function xmlContent(): Attribute
    {
        return Attribute::make(fn() => $this->getAttribute('xml_content'));
    }
    public function xsdContent(): Attribute
    {
        return Attribute::make(fn() => $this->getAttribute('xsd_content'));
    }
    public function xsltContent(): Attribute
    {
        return Attribute::make(fn() => $this->getAttribute('xslt_content'));
    }


    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }
}
