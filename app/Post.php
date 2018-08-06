<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;



class Post extends Model
{
    
    //Table name
    protected $table = 'posts';
    //primary key field change
    public $primaryKey = 'id';
    //timestamps
    public $timestamps  = true;

    /*sorting posts by attributes
        public $sortable = ['title', 'created_at'];
    */

    //post - user relationship
    public function user(){
        return $this->belongsTo('App\User');
    }

    //search query
    public function scopeSearch($query, $s){
        return $query->where('title', 'like', '%' .$s. '%')
                    ->orWhere('body', 'like', '%' .$s. '%')
                    ->orWhere('issn', 'like', '%' .$s. '%');
    }
}
