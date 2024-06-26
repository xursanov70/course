<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function createCategory(CreateCategoryRequest $request)
    {
        if ($this->can('create_category') == 'denied'){
            return response()->json(["message" => "Sizda bunday huquq mavjud emas!"], 403);
        }

        $photoPath = $request->file('category_image')->store('images', 'public');

        Category::create([
            'category_name' => $request->category_name,
            'category_image' => $photoPath,
        ]);
        return response()->json(["message" => "Categorya muvaffaqqiyatli yaratildi!"], 201);
    }

    public function getCategory(){
        return Category::where('active', true)->get();
    }

    public function showByIdCategory(int $category_id){
        return Category::findOr($category_id, function () {
            return response()->json(["message" => "Categorya mavjud emas!"], 404);
      });
    }
}
