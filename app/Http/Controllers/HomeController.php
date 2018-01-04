<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
            ->with('users',User::all()->count())
            ->with('category',Category::all()->count())
            ->with('trashed',Post::onlyTrashed()->count())
            ->with('posts',Post::all()->count());
    }
}
