<?php

namespace App\Http\Controllers;

use App\Models\{Tag,Post,User,Category};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $postcount = Post::all()->count();
        $catcount = Category::all()->count();
        $tagcount = Tag::all()->count();
        $usercount = User::all()->count();
        $posts = Post::latest()->paginate(5);
        return view('admin.dashboard.index',compact('postcount','catcount','tagcount','usercount','posts'));
    }
}
