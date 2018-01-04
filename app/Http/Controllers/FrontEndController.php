<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Settings;
use \App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        return view('index')->with('setting',Settings::first())
               ->with('category',Category::take(5)->get())
               ->with('last_post',Post::orderBy('created_at','desc')->first())
               ->with('secnd_post',Post::skip(1)->take(1)->first())
               ->with('third_post',Post::skip(2)->take(1)->first())
               ->with('ajax',Category::find(3))
               ->with('jquery',Category::find(4))
               ->with('mysql',Category::find(6));
    }

    public function single_post($slug){

        $post = Post::where('slug',$slug)->first();
        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');


        return view('app.single_post')->with('category',Category::take(5)->get())
            ->with('setting',Settings::first())
            ->with('post',$post)
            ->with('next_post',Post::find($next_id))
            ->with('prev_post',Post::find($prev_id));
    }


    public function category($id){
        return view('app.category')
            ->with('category',Category::take(5)->get())
            ->with('category_one',Category::find($id))
            ->with('setting',Settings::first())
            ->with('tags',Tag::all());
    }
    public function tag($id){
        return view('app.tag')
            ->with('category',Category::take(5)->get())
            ->with('tag',Tag::find($id))
            ->with('setting',Settings::first());
    }
    public function search(Request $request){
        return view('app.results')
            ->with('results',Post::where('title','like' ,'%'.request('query').'%')->get())
            ->with('category',Category::take(5)->get())
            ->with('tags',Tag::all())
            ->with('setting',Settings::first())
            ->with('request',request('query'));

    }
}
