@extends('pages.master')


@section('content')
    <h1>Publish a post</h1>

    <hr>

    <form action="/posts" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Content: </label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

        @include('pages.errors')
    </form>


@endsection