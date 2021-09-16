<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function delete_category(Request $request)
    {
        $delete = Category::find($request->cat);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Category Deleted'
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'msg' => 'An error occured!'
            ]);
        }
    }

    // Posts

    public function store_post(Request $request)
    {
        $add = new Post;
        $add->category_id = $request->post['category_id'];
        $add->title = $request->post['title'];
        $add->content = $request->post['content'];
        if ($add->save()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Post added successfully'
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => 'An error occured!'
            ]);
        }
    }

    public function fetch_post()
    {
        $post = Post::latest()->get();
        return json_encode($post);
    }

    public function delete_post(Request $request)
    {
        $delete = Post::find($request->id);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Post deleted Successfully'
            ]);
        }else {
            return response()->json([
                'code' => 500,
                'msg' => 'Error occured!'
            ]);
        }
    }
}
