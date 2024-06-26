<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    public function createLesson(CreateLessonRequest $request)
    {
        if ($this->can('create_lesson') == 'denied'){
            return response()->json(["message" => "Sizda bunday huquq mavjud emas!"], 403);
        }

        $videoPath = $request->file('video')->store('videos', 'public');
        $auth = auth()->user();
        Lesson::create([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $videoPath,
            'course_id' => $request->course_id,
            'user_id' => $auth->id,
        ]);
        return response()->json(["message" => "Video darslik muvaffaqqiyatli yaratildi!"], 201);
    }

    public function getLesson()
    {
        return Lesson::with(['course.category'])
            ->where('active', true)
            ->paginate(15);
    }

    public function showByIdLesson(int $lesson_id){

        $lesson = Lesson::with(['course.category'])
        ->where('active', true)
        ->where('id', $lesson_id)
        ->first();
        if (!$lesson){
            return response()->json(["message" => "Dars mavjud emas!"], 404);
        }else{
            $lesson->view += 1;
            $lesson->save();
            return $lesson;
        }
    }

    public function searchLesson(){
        $search = request('search');

          return  Lesson::with(['course.category'])
          ->where('active', true)
          ->whereAny([
              'title',
              'description',
          ], 'LIKE', "%$search%")
          ->paginate(15);

    }
}
