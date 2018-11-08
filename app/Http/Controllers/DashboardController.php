<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\inbox;
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
        $allposts = Post::count();
        $postcount = Post::where('user_id', $user_id)->count();
        $postcon = $postcount*100/$allposts;
        $postpercentage = number_format((float)$postcon, '2', '.', '');
        $userlist = User::orderBy('created_at', 'desc')->get();
        $inbox = inbox::where('to', auth()->user()->id)->get();
        $outbox  = inbox::where('user_id', auth()->user()->id)->get();
       

        return view('dashboard', compact('posts', $user->posts, 'userlist', 'inbox', 'outbox', 'postcount', 'postpercentage'));

        // for posts pagination
        $posts->appends(Request::query())->render();
    }
    
    //REDIRECT TO NEW MESSAGE EDITOR/MODAL
    public function create()
    {

        // $userMsg = User::pluck('name', 'id');
        // return view('/dashboard', compact('id', 'userMsg'));
        // if(count(error) > 0){
        //     return redirect('/dashboard')->with('error', 'There seems to be an error with your message, try again');

        // }
        // return redirect('/dashboard')->with('Success', 'Message sent');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);
        //CREATE AND STORE NEW MESSAGE
        $inbox = new inbox;
        $inbox->subject = $request->input('subject');
        $inbox->message = $request->input('message');
        $inbox->to = $request->input('to');
        $inbox->reply_id = $request->input('reply_id');
        $inbox->user_id = auth()->user()->id;
        $inbox->from = auth()->user()->name;         
        $inbox->save();

        return redirect('/dashboard')->with('success', 'Message sent');
    }

    public function reply($id){
        
        $mybox= inbox::where('to', auth()->user()->id)->get();  
    }



    public function changePword(Request $request){
        
        $user = auth()->user();
        
        $currentPass = $request->input('currentPass');
        $newPass = $request->input('newPass');
        $confirmPass = $request->input('confirmPass');

        if(Hash::check($currentPass, $user->password)){

            if($newPass == $confirmPass){

                $user->password = Hash::make ($request->input('newPass'));
                $user->save();

            return redirect('dashboard')->with('success', 'Password updated successfully');
                
            }
            else{
                return redirect('dashboard')->with('error', 'Your new passwords do not match, try again');
            }

        }

        else{
            return redirect('dashboard')->with('error', 'The password you entered does not match our records');
        }
    }

    

    //DELETE USER FROM DB AND SYSTEM
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

    public function destroyMsg($id){
        $inbox = inbox::find($id);
        $outbox = $inbox;

        $inbox->delete();
        
         
        return redirect('/dashboard')->with('success', 'Message Deleted');
    }


   


   
}
