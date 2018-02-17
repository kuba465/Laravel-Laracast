<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];
    //If I don't want to add all fields all the time I can replace fillable with quarded and put only names that I don't want to save
}
