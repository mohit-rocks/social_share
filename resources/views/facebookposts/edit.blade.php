@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Edit Facebook Post</h1>

        @include('layouts.error')

        {{ Form::model($post, array('route' => array('facebook-posts.update', $post->id), 'method' => 'PUT')) }}
        {!! Form::token() !!}
        <div class="form-group">
            {{ Form::label('Body', null, ['class' => 'col-2 col-form-label']) }}
            {{ Form::textarea('body', $post->body, ['class' => 'col-10 form-control']) }}
        </div>

        <div class="form-group row">
            {{ Form::label('Published Date', null, ['class' => 'col-2 col-form-label']) }}
            {{ Form::datetimeLocal('published_date', new \Carbon\Carbon($post->published_date), ['class' => 'col-10 form-control']) }}
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}

    </div>

@endsection
