<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() //this function blocks off dashboard from unauthenticated users
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $postadmin = Post::orderBy('created_at','desc')->paginate(10);
        $usercount = User::count();
        $userlist = User::orderBy('created_at', 'desc')->get();
       

        return view('dashboard', compact('posts', 'postadmin', $user->posts, 'usercount', 'userlist'));

        // for posts pagination
        $posts->appends(Request::query())->render();
    }

    //deletes user in db
    public function destroy($id)
    {
        $user = User::find($id);
        //preventing logged in user from deleting themselves
        if(auth()->user()->id == $user->id){
            return redirect('/dashboard')->with('error', 'Suicidal? Why remove yourself?');
        }
        //allowing logged in user (Admin) delete other users
        if(auth()->user()->id != $user->id){
            $user->delete();
            //User::delete($user->id);
        }

        //$user->delete();
        return redirect('/dashboard')->with('success', 'User Removed');
    }
}
