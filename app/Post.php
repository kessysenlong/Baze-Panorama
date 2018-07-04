<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts';
    //primary key field change
    public $primaryKey = 'id';
    //timestamps
    public $timestamps  = true;
}
