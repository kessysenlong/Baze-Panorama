<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\inbox;
use App\Category;
use App\Post;
use App\Application;
use DB;

class AdminDashboardController extends Controller
{
    //
    public function __construct() //this function blocks off dashboard from unauthenticated users
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $postadmin = Post::orderBy('created_at','DESC')->paginate(7);
        $usercount = User::count();
        $userlist = User::orderBy('created_at', 'desc')->get();
        $inbox = inbox::where('to', auth()->user()->id)->get();
        $read = $inbox->where('is_read', 1);
        $unread = $inbox->where('is_read', 0);
        $outbox  = inbox::where('user_id', auth()->user()->id)->get();
        $applicants = Application::where('status', 0)->orderBy('created_at', 'DESC')->paginate(2);
        $applicantscount = $applicants->count();
        $acceptedapps = Application::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $rejectedapps = Application::where('status', 2)->orderBy('created_at', 'DESC')->get();
        $category = Category::orderBy('name', 'asc')->get();
        $catcount = Category::count();
        $allposts = Post::count();
        $postcount = Post::where('user_id', $user_id)->count();
        $postcon = $postcount*100;
        $postpercentage = number_format((float)$postcon, '2', '.', '');


        return view('dashboardAdmin', compact('posts', 'postadmin', $user->posts, 'applicantscount','read', 'unread', 'applicants', 'usercount', 'catcount', 'userlist', 'inbox', 'outbox', 'category', 'postcount', 'postpercentage'));

        // for posts pagination
        $posts->appends(Request::query())->render();
        //
        $applicants->appends(Request::query())->render();
    }

    public function create()
    {

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
        $inbox->from = auth()->user()->name; //gets current user id and saves it to from field        
        $inbox->save();

        return redirect('/dashboardAdmin')->with('success', 'Message sent');
    }



    //DELETE USER FROM DB AND SYSTEM
    public function destroy($id)
    {
        
        $user = User::find($id);
        //preventing logged in user from deleting themselves
        if(auth()->user()->id == $user->id){
            return redirect('/dashboardAdmin')->with('error', 'Suicidal? Why remove yourself?');
        }
        //allowing logged in user (Admin) delete other users
        if(auth()->user()->id != $user->id){
            $user->delete();
            //User::delete($user->id);
        }

        return redirect('/dashboardAdmin')->with('success', 'User Removed');
    }

    public function destroyMsg($id){

        $inbox = inbox::find($id);
        $inbox->delete();
         
        return redirect('dashboardAdmin')->with('success', 'Message Deleted');
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

            return redirect('dash.custom')->with('success', 'Password updated successfully');
                
            }
            else{
                return redirect('dash.custom')->with('error', 'Your new passwords do not match, try again');
            }

        }

        else{
            return redirect('dash.custom')->with('error', 'The password you entered does not match our records');
        }
    }


}
