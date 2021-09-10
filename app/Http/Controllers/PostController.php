<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store_category(Request $request)
    {
        if (Category::where('category', $request->cat)->exists()) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Category already exists'
            ]);
        } else {
            $category = new Category;
            $category->category = $request->cat;
            if ($category->save()) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Category added successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'An error occured!'
                ]);
            }
        }
                
    }

    public function fetch_category()
    {
        $category = Category::all();
        return json_encode($category);
    }
}
