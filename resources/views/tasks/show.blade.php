
@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title">Task id : {{$task->id}}</h2>
            <p class="blog-post-meta">{{ $task->created_at }} by <a href="#">Mark</a></p>
            {{ $task->body }}
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

@endsection



