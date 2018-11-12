<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //lib for public folder storage
use App\Post; //fetch post
use DB; //to not use eloquent but sql query
use Input;
use App\User;
use App\Category;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() //this function blocks off posts from unauthenticated users
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //except pages index and show, so guest can view posts
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $posts = new Post;
        $category = Category::all();
                
        

        if(request()->hasFile('cover_image')){
            //check for file extension
            $ext1 = $request->file('cover_image')->getClientOriginalExtension();           
        }

        if(request()->has('category')) {
            //filter results
            $posts = $posts::where('category', request('category'));
           
        }

        if(request()->has('sorttime')){
            //sort results by time
            $posts = $posts::orderBy('created_at', request('sorttime'));
        }

        if(request()->has('sorttitle')){
            //sort results by title
            $posts = $posts::orderBy('title', request('sorttitle'));
        }

        $posts = $posts->orderBy('created_at', 'desc')->paginate(10)->appends([
            'category' => request('category'),
            'sorttime' => request('sorttime'),
            'sorttitle' => request('sorttitle')
        ]);
       

      
        return view('posts.index', compact('posts', 'category'));
        
        $posts->appends(Request::query())->render();
        
    }
       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name');


        return view('posts.create')->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'nullable',
            'issn' => 'nullable',
            'category' => 'required',
            'cover_image' => 'nullable|max:20000000'
           
        ]);
        //handle file upload
        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //create post
        $post = new Post;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->issn = $request->input('issn');
        $post->category = $request->input('category');
        $post->user_id = auth()->user()->id; //gets current user id and saves it to post id field
        $post->cover_image = $fileNameToStore;
        $post->save();
    
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetching post id from db
        $post = Post::find($id);
        $cat = $post->category;
        $relatedposts = Post::all()->where('category', $cat)->take(4);
        
        return view('posts.show', compact('post', 'relatedposts'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorised page');
        }
        return view('posts.edit')->with('post', $post);
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
            'title' => 'required',
            'body' => 'nullable',
            'issn' => 'nullable',
            'category' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        //update edited post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        //test to see if user actually uploaded file
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deletes posts in db
        $post = Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorised page');
        }
        if($post->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
