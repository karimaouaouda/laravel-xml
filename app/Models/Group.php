<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'group_number',
    ];


    //relationships
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function exercises(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Exercise::class, 'groups_exercises');
    }

}
