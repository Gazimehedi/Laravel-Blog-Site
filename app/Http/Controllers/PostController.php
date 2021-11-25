<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(20);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create',compact('categories','tags'));
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
            'title'=>'required|unique:posts',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'category'=>'required',
            'description'=>'required'
        ]);
        $image = $request->image;
        $image_name = time().".".$image->getClientOriginalExtension();
        $image->move('storage/post/',$image_name);
        $post = Post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title,'-'),
            'image'=>'storage/post/'.$image_name,
            'description'=>$request->description,
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
            'published_at'=> Carbon::now()
        ]);
        $post->tag()->attach($request->tag);
        return redirect()->route('admin.post.index')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title'=>'required|unique:posts,title,'.$post->id,
            'image'=>'image|mimes:jpg,jpeg,png',
            'category'=>'required',
            'description'=>'required'
        ]);
        if(isset($request->image)){
            if(File::exists($post->image)){
                File::delete($post->image);
            }
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $image->move('storage/post/',$image_name);
            $post->image = 'storage/post/'.$image_name;
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title,'-');
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->save();
        $post->tag()->sync($request->tag);
        return redirect()->route('admin.post.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(File::exists($post->image)){
            File::delete($post->image);
        }
        $post->delete();
        return redirect()->route('admin.post.index')->with('success','Post deleted successfully');
    }
}
