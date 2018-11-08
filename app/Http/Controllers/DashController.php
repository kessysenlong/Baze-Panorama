<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Inbox;

class DashController extends Controller
{
    public function dash(){
        $user = Auth::user();

        if($user->is_admin()){
            return redirect('dashboardAdmin');
        }
        
            return redirect('dashboard');
    }

}
