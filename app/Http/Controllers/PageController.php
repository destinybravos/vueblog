<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function about()
    {
        return Inertia::render('About');
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function posts()
    {
        return Inertia::render('Posts');
    }

    public function addposts()
    {
        return Inertia::render('MakePost');
    }

    public function categories()
    {
        return Inertia::render('MakePost');
    }

    public function dashboard(Request $request)
    {
        $user = $request->user();
        return Inertia::render('Dashboard', ['user' => $user]);
    }

    // public function login(LoginRequest $request)
    // {
    //     return $request->remember == true? 'on' : 'off';
    //     $request->validate([
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    //         if (!$request->has('endpoint')) {
    //             $request->session()->regenerate();
    //         }
            // if (count($request->user()->tokens) > 0) {
            //     $request->user()->tokens()->delete();
            // }

            // $responses = [
            //     'apitoken' => $request->user()->createToken('User Token')->plainTextToken
            // ];
    //         return response()->json([
    //             'status' => 'success',
    //             'messages' => '',
    //             'result' => $responses
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status' => 'auth_error'
    //         ]);
    //     }
    // }
    
    // public function register(RegisterRequest $request)
    // {
    //     $request->validate([
    //         'firstname' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'phone' => ['required', 'string', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:5', 'confirmed'],
    //     ]);

    //     if(User::create([
    //         'firstname' => $request->firstname,
    //         'lastname' => $request->lastname,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ])){
    //         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //             if (!$request->has('endpoint')) {
    //                 $request->session()->regenerate();
    //             }
    
    //             $responses = [
    //                 'apitoken' => $request->user()->createToken('User Token')->plainTextToken
    //             ];
    //             return response()->json([
    //                 'status' => 'success',
    //                 'messages' => '',
    //                 'result' => $responses
    //             ]);
    //         }else{
    //             return response()->json([
    //                 'status' => 'auth_error'
    //             ]);
    //         }
            
    //     }else{
    //         return response()->json([
    //             'status' => 'error'
    //         ]);
    //     }

    // }

    public function delete_token(Request $request)
    {
        if ($request->user()->tokens()->delete()) {
            return response()->json([
                'status' => 'success',
                'messages' => '',
                'result' => []
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'messages' => '',
                'result' => []
            ]);
        }
    }
}
