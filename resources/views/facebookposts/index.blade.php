@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/facebook-posts/{{ $post->id }}"> Post: {{ $post->id }} </a></h2>
                <h3> {{ $post->body }}</h3>
                <p class="blog-post-meta">Published Date : {{ $post->published_date }}</p>
            </div><!-- /.blog-post -->
        @endforeach
    </div>
@endsection
