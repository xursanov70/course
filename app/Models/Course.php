<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'course_image',
        'category_id',
        'active'
    ];

    public function category(){
        return $this->hasMany(Category::class, 'id', 'category_id');
    }
}
