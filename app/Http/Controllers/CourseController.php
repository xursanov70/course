<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function createCourse(CreateCourseRequest $request)
    {
        if ($this->can('create_course') == 'denied'){
            return response()->json(["message" => "Sizda bunday huquq mavjud emas!"], 403);
        }

        $photoPath = $request->file('course_image')->store('images', 'public');

        Course::create([
            'course_name' => $request->course_name,
            'category_id' => $request->category_id,
            'course_image' => $photoPath,
        ]);
        return response()->json(["message" => "Kurs muvaffaqqiyatli yaratildi!"], 201);
    }

    public function getCourse(){
        return Course::with('category')->where('active', true)->get();
    }

    public function showByIdCourse(int $course_id){

        $course = Course::with('category')->where('active', true)->where('id', $course_id)->first();
        if (!$course){
            return response()->json(["message" => "Kurs mavjud emas!"], 404);
        }else{
            return $course;
        }
    }
}
