<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(){
        $recent_posts = Post::with('tag','category','user')->orderBy('created_at','DESC')->paginate(9);

        $posts = Post::with('tag','category','user')->orderBy('created_at','DESC')->take(5)->get();
        $postFirst2 = $posts->splice(0,2);
        $postMiddle = $posts->splice(0,1);
        $postLast2 = $posts->splice(0);
        $footerPosts = Post::with('tag','category','user')->inRandomOrder()->limit(4)->get();
        $footerFirst = $footerPosts->splice(0,1);
        $footerMiddle2 = $footerPosts->splice(0,2);
        $footerLast = $footerPosts->splice(0,1);
        return view('index',compact('recent_posts','postFirst2','postMiddle','postLast2','footerFirst','footerMiddle2','footerLast'));
    }
    public function post($slug){
        $categories = Category::withCount('post')->get();
        $tags = Tag::all();
        $popularPosts = Post::with('tag','category','user')->inRandomOrder()->limit(3)->get();
        $post = Post::with('tag','category','user')->where('slug',$slug)->first();
        $relatedPosts = Post::where('category_id', $post->category_id)->with('category')->inRandomOrder()->take(4)->get();
        $relatedFirst = $relatedPosts->splice(0,1);
        $relatedMiddle2 = $relatedPosts->splice(0,2);
        $relatedLast = $relatedPosts->splice(0,1);
        if($post){
            return view('post',compact('post','popularPosts','categories','tags','relatedLast','relatedMiddle2','relatedFirst'));
        }
        return redirect('/');
    }
    public function category($slug){
        $category = Category::where('slug',$slug)->first();
        $posts = Post::where('category_id',$category->id)->with('category','tag','user')->paginate(9);
        if($category){
            return view('category',compact('category','posts'));
        }
        return redirect('/');
    }
    public function tag($slug){
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->post()->orderBy('created_at','desc')->paginate(9);
        if($tag){
            return view('tag',compact('tag','posts'));
        }
        return redirect('/');
    }
    public function about(){
        $user = User::first();
        if($user){
            return view('about',compact('user'));
        }
        return redirect('/');
    }
    public function contact(){
        return view('contact');
    }
    public function message_send(Request $request){
        $request->validate([
            'name'=>'required|max:150',
            'email'=>'required|max:200',
            'subject'=>'required|max:250',
            'message'=>'required|min:100',
        ]);
        Message::create($request->all());
        return redirect()->back()->with('success','Message send successfully');
    }
}
