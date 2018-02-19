<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        //method latest order posts by created_at column
        //but when post doesn't have this date it will show them from first to lastest
        //so if some post doesn't have a create date I need to sort then by id
//        $posts = Post::orderBy('id', 'desc')->get();
//        $posts = Post::latest();
//
//        if ($month = \request('month')) {
//            $posts->whereMonth('created_at', Carbon::parse($month)->month);
//        }
//
//        if ($year = \request('year')) {
//            $posts->whereYear('created_at', $year);
//        }
//
//        $posts = $posts->get();

        $posts = Post::latest()
            ->filter(\request(['month', 'year']))
            ->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();

        return view('pages.main', compact('posts', 'archives'));
    }

    //If you want to use this model binding slug name MUST BE THE SAME as Post variable
    public function show(Post $post)
    {
        //Carbon::setLocale('pl');

        return view('pages.show', compact('post'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store()
    {
        //every form need to be validated!!!
        $this->validate(\request(), [
            'title' => 'required|min:2',
            'body' => 'required'
        ]);
        //First way
//        $post = new Post;
//
//        $post->title = request('title');
//        $post->body = \request('body');
//
//        $post->save();

        //Second way
        //If I want to save datas from request like this
        //I need to add names of fields to fillable in model

//        Post::create([
//            'title' => \request('title'),
//            'body' => \request('body')
//        ]);

        //I think the best(as like Laracasts say)
//        Post::create([
//            'title' => \request('title'),
//            'body' => \request('body'),
//            'user_id' => auth()->id()
//        ]);

        auth()->user()->publish(
            new Post(\request(['title', 'body']))
        );

        return redirect('/');
    }

}
