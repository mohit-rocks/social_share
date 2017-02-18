@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title">Task id : {{$post->id}}</h2>
            <p class="blog-post-meta">Created on : {{ $post->created_at }}</p>
            <h3>{{ $post->body }}</h3>
            <h4>Published Date : {{ $post->published_date }}</h4>
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

@endsection
