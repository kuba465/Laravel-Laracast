<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Post $post)
    {
        $this->validate(\request(), [
            'body' => 'required|min:1'
        ]);

//        Comment::create([
//            'post_id' => $post->id,
//            'body' => \request('body')
//        ]);

        $post->addComment(\request('body'));

        return back();
    }
}
