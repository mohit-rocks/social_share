@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Create a Facebook Post</h1>

        @include('layouts.error')

        {!! Form::open(['url' => 'facebook-posts']) !!}
            {!! Form::token() !!}
            <div class="form-group">
                {{ Form::label('Body', null, ['class' => 'col-2 col-form-label']) }}
                {{ Form::textarea('body', null, ['class' => 'col-10 form-control']) }}
            </div>

            <div class="form-group row">
                {{ Form::label('Published Date', null, ['class' => 'col-2 col-form-label']) }}
                {{ Form::datetimeLocal('published_date', \Carbon\Carbon::now(), ['class' => 'col-10 form-control']) }}
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        {!! Form::close() !!}

    </div>

@endsection
