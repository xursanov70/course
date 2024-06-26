<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'video',
        'course_id',
        'user_id',
        'active',
        'view'
    ];

    public function course()
    {
        return $this->hasMany(Course::class, 'id', 'course_id');
    }
}
