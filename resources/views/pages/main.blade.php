@extends('pages.master')

@section('titleAndTwoPosts')

    @include('pages.bigTitle')
    @include('pages.twoPosts')

@endsection


@section('content')

    @include('pages.includeInMain.main', ['posts'=>$posts])

@endsection

