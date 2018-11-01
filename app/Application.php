<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application;

class Application extends Model
{
    //
    protected $table = 'application';
    

    public function user(){

    return $this->hasOne('App\Application');
}

}




   
    