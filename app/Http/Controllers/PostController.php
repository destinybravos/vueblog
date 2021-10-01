<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function store_contact(Request $request)
    {
        $contact = new Contact;
        $contact->fullname = $request->cont['fullname'];
        $contact->email = $request->cont['email'];
        $contact->subject = $request->cont['subject'];
        $contact->content = $request->cont['content'];
        if ($contact->save()) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Message Sent Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'An error occured!'
            ]);
        }
    }
                
    
    public function fetch_contact()
    {
        $contact = Contact::all();
        return json_encode($contact);
    }

    // Image Processing
    // public function upload_image(Request $request)
    // {
    //     $extArray = ['png', 'jpg', 'jpeg'];
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image')->getClientOriginalName();
    //         $filename = pathinfo($file, PATHINFO_FILENAME);
    //         $ext = pathinfo($file, PATHINFO_EXTENSION);
    //         $name2store =  $filename . time() . '.' . $ext;
    //         if (in_array(strtolower($ext), $extArray)) {
    //             if ($request->file('image')->storeAs('/public/images/gallery', $name2store)) {
    //                 $gallery = new Gallery;
    //                 $gallery->image = $name2store;
    //                 if ($gallery->save()) {
    //                     return 'Image was stored successfully';
    //                 }else{
    //                     unlink(storage_path('app/public/images/gallery/' . $name2store));
    //                     return 'Image was not stored';
    //                 }
    //             }                
    //         }else{
    //             return 'Invalid Images';
    //         }
    //     } else {
    //         return 'No Image Found';
    //     }
    // }

    public function upload_image(Request $request)
    {
        $extArray = ['png', 'jpg', 'jpeg'];
        if ($request->hasFile('image')) {
            $image_file = $request->file('image')->getRealPath();
            $file = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $name2store =  $filename . time() . '.' . $ext;
            if (in_array(strtolower($ext), $extArray)) {
                $image = Image::make($image_file);
                $image->resize(600,  null, function ($constraint) {
                    $constraint->aspectRatio();
                    });
                if ($image->save(storage_path('app/public/images/gallery/' . $name2store))) {
                    $gallery = new Gallery;
                    $gallery->image = $name2store;
                    if ($gallery->save()) {
                        return 'Image was stored successfully';
                    }else{
                        unlink(storage_path('app/public/images/gallery/' . $name2store));
                        return 'Image was not stored';
                    }
                }                
            }else{
                return 'Invalid Images';
            }
        } else {
            return 'No Image Found';
        }
    }

    // Image Processing
    public function upload_images(Request $request)
    {
        $extArray = ['png', 'jpg', 'jpeg'];
        if ($request->hasFile('images')) { 
            // $num_of_images = count($request->file('images'));
            $no_stored = 0;
            foreach ($request->file('images') as $image) {
                $file = $image->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $name2store =  $filename . time() . '.' . $ext;
                if (in_array(strtolower($ext), $extArray)) {
                    if ($image->storeAs('/public/images/gallery', $name2store)) {
                        $gallery = new Gallery;
                        $gallery->image = $name2store;
                        if ($gallery->save()) {
                            $no_stored++;
                        }else{
                            unlink(storage_path('app/public/images/gallery/' . $name2store));
                        }
                    }                
                }else{
                    return 'Invalid Images';
                }  
            }
            return $no_stored . ' images were stored successfully';
        }else{
            return 'No Image Founds';
        }
    }
}
