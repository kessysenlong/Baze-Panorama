<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\inbox;
use App\Post;
use DB;

class InboxController extends Controller
{
    //

    public function index()
    {
        $inbox = inbox::where('to', auth()->user()->id);
        $inboxcount = inbox::count();
       

        return view('dashboard', compact('inbox', 'inboxcount'));

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
        $inbox->from = auth()->user()->id; //gets current user id and saves it to from field        
    
         if(count(error) > 0){
            return redirect('/dashboard')->with('error', 'There seems to be an error with your message, try again');
         }

        $inbox->save();
        return redirect('/dashboard')->with('success', 'Message sent');
    }

    //SHOW MESSAGES
    public function show()
    {
        //fetching receipient id from db
        // $myBox = inbox::where('to', auth()->user()->id);
        // return view('/dashboard')->with('myBox', $myBox);
    }


     //DELETE MESSAGE
     public function destroy($id)
     {
         $inbox = inbox::find($id);
         $inbox->delete();
         
         return redirect('/dashboard')->with('success', 'Message Deleted');
     }
}
