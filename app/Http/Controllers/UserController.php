<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Mail\Mailable;
use App\Application;
use App\User;
use Mail;
use App\Mail\AccountCreated;
use App\Mail\RejectedApplication;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $app_id = $request->input('app_id');
        $email = $request->input('email');
        $applicant = Application::where('id', $app_id)->first();

    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|unique:users'
    ]);

        $applicant->status = 1;
        $applicant->save();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make('abcde12345');
        $user->admin = $request->input('admin');
        $user->save();
        
        
        Mail::to($email)->send(new AccountCreated);

        return redirect('dashboardAdmin')->with('success', 'New user created');
    // }
    // return redirect('dashboardAdmin')->with('error', 'The system cannot register this user');
    }

    public function reject(Request $request){

        $app_id = $request->input('app_id');
        $email = $request->input('email');
        $applicant = Application::where('id', $app_id)->first();

        $applicant->status = 2;
        $applicant->save();

        Mail::to($email)->send(new RejectedApplication);
        return redirect ('dashboardAdmin')->with('success', 'Application rejected');

    }
    
}
