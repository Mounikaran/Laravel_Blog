<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // table Name
    protected $table = "posts";

    // primary Key
    public $primaryKey = "id";

    // timestamps
    public $timestamps = true;

    function user()
    {
        return $this->belongsTo('App\User');
    }
}