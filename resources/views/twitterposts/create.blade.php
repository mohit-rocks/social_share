@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Create a Twitter Post</h1>

        @include('layouts.error')

        <form method="POST" action="/twitter-posts">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" id="body" rows="4" name="body" required></textarea>
            </div>

            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-2 col-form-label">Published Date</label>
                <div class="col-10">
                    <input class="form-control" type="datetime-local" value="2017-03-16T13:45:00" id="published_date" name="published_date" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>

@endsection
