@extends('pages.master')

@section('content')

    <h1>{{$post->title}}</h1>

    <p>{{$post->body}}</p>

    <hr>

    <div class="card">
        <div class="card-body">
            <form method="post" action="/posts/{{$post->id}}/comments">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" placeholder="Your comment" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                @include('pages.errors')
            </form>
        </div>
    </div>

    <hr>

    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{$comment->created_at->diffForHumans()}}: &nbsp;
                    </strong>
                    {{$comment->body}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection