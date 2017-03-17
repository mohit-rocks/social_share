@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title">Task id : {{$post->id}}</h2>
            <p class="blog-post-meta">Created on : {{ $post->created_at }}</p>
            <h3>{{ $post->body }}</h3>
            <h4>Published Date : {{ $post->published_date }}</h4>
            <h4 class="edit-post"><a href="{{ URL::to('facebook-posts/' . $post->id . '/edit') }}">Edit</a></h4>

            {{ Form::open(array('url' => 'facebook-posts/' . $post->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this post', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

@endsection
