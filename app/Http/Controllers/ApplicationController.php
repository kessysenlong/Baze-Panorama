<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{
    //

    public function index(Request $request){

        return view('pages.application');
    }

    protected function validator(array $data)
    {
    return Validator::make($data, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
     ]);
}

public function store(Request $request){

    $emailstr = $request->input('email');
    $check = strpos($emailstr, '@bazeuniversity.edu.ng'); 

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:application'
        ]);

        

        if($check != null){

        //create post
        $applicant = new Application;
        $applicant->name = $request->input('name');
        $applicant->email = $request->input('email');
        $applicant->role = $request->input('role');
        $applicant->body = $request->input('body');
        $applicant->save();
    
        return redirect('/')->with('success', 'Application Sent Successfully. You will receive our response soon :)');
    }
    return redirect('/application')->with('error', 'Use your Baze email address');
}

}
