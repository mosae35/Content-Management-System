<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $category = Category::all();
        $category = array_pluck($category,'name','id');
        if(count($category)&& count($tags) == 0){
            return redirect()->back()->with('info','your Category and tag musy have some items');
        }
        return view('admin.post.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
           'title'=>'required|min:2|max:100',
           'content'=>'required|min:2',
           'category_id'=>'required',
           'tags'=>'required'

       ]);

       $file = $request['image'];
       $image_new_name =time().$file->getClientOriginalName();
       $file->move('uploades/posts',$image_new_name);

       $post = Post::create([

           'image' =>'uploades/posts/'.$image_new_name,
           'title' => $request->title,
           'content' => $request['content'],
           'category_id' => $request['category_id'],
           'slug' =>  str_slug($request->title),
       ]);

        $post->tags()->attach($request->tags);

       return redirect('posts')->with('success','Your Post Shared');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::findOrFail($id);
        $category = Category::all();
        $category = array_pluck($category,'name','id');
        return view('admin.post.edit',compact('post','category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image',
            'content' => 'required|min:2',
            'category_id' => 'required',
            'tags'=>'required'
        ]);

        $data = Post::find($id);

        if ($request->hasFile('image')) {
            $file = $request['image'];
            $image_new_name = time() . $file->getClientOriginalName();
            $data->image = 'uploades/posts/'.$image_new_name;
            $file->move('uploades/posts', $image_new_name);
        }else{
            $data->image = $data->image;
        }

        $data->title = $request['title'];
        $data->content = $request['content'];
        $data->category_id = $request['category_id'];
        $data->slug =  str_slug($request['title']);
        $data->save();

        $data->tags()->sync($request->tags);

        return redirect('posts')->with('success','Your Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back()->with('success','this post just trashed');
    }

    public function trashed(){

       $trashe =  Post::onlyTrashed()->get();
       return view('admin.post.trashed',compact('trashe'));

    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect('post/trashed')->with('success','this post removed from database');
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect('posts')->with('success','this post restored successfully');
    }
}
