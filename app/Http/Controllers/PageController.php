<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
