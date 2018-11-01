<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'postcategory';
    protected $fillable = ['name'];

    // public function post(){
    // return $this->belongsTo('App\Post');
    // }
    public function category(){
        return $this->belongsTo('App\Category');
        }
}
