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
        // 'password' => 'required|min:6|confirmed',
        /*'usertype' => 'required',*/
     ]);
}

public function store(Request $request){
        $string = '@bazeuniversity.edu.ng';

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        if(strpos($request->input('email'), $string) !== false){

        //create post
        $applicant = new Application;
        $applicant->name = $request->input('name');
        $applicant->email = $request->input('email');
        $applicant->body = $request->input('body');
        $applicant->save();
    
        return redirect('/')->with('success', 'Application Sent Successfully');
    }
    return redirect('/application')->with('error', 'Use your Baze email address');
}

}
