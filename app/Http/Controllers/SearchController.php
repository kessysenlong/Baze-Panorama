<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    //
    public function index(Request $request){
        $s = $request->input('s'); 
        $posts = Post::latest()->search($s)->paginate(10);
        
        return view('posts.search', compact('posts', 's'));
    }
}
