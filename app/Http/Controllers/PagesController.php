<?php

namespace App\Http\Controllers; //auto names the controller

use Illuminate\Http\Request; //adds the request library to handle requests

class PagesController extends Controller //extends core controller, all created cpntrollers should extend core
{
    public function index(){
        $title = 'Welcome to Laravel!';
        //return view ('pages.index', compact('title')); 
        return view ('pages.index') -> with('title', $title); //this can be achieved using either this method or the one above
    }
    public function about(){
        $title = 'About Us';
        return view('pages.about')-> with('title', $title);;
    }
    public function services (){
        $data = array(
            'title' => 'Services',
            'services' => ['Web design', 'Programming', 'SEO']
        );
        return view ('pages.services')-> with ($data); //return page with appended array data
    }
}
