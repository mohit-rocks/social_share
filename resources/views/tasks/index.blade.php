@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        @foreach($tasks as $task)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/tasks/{{ $task->id }}"> {{ $task->body }} </a></h2>
                <p class="blog-post-meta">{{ $task->created_at }} by <a href="#">Mark</a></p>
                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
            </div><!-- /.blog-post -->
        @endforeach
    </div>
@endsection
