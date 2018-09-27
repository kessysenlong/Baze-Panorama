<?php

namespace App\Http\Controllers; //auto names the controller

use Illuminate\Http\Request; //adds the request library to handle requests
use App\Post; 
use DB;
use Mail;

class PagesController extends Controller //extends core controller, all created cpntrollers should extend core
{
    public function index(){
        $title = 'Baze publications';
        $latestpost = Post::latest()->first();
        $posts = Post::get();
        $postcount = Post::count();
       
        
       
        return view ('pages.index', compact('title', 'latestpost', 'posts', 'postcount')); 
        //return view ('pages.index') -> with('title', $title); //this can be achieved using either this method or the one above
    }
    public function about(){
        $title = 'About Us';
        return view('pages.about')-> with('title', $title);;
    }
    public function contact (){
        $title ='Contact Us';

        //return view ('pages.contact')-> with( 'title', $title);//return page with appended array data
        return view ('pages.contact');
    }
    public function search(){
        $title = 'Search Results';
        return view('pages.search')-> with('title', $title);;
    }
    
}
