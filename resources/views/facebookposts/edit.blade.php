@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Edit Facebook Post</h1>

        @include('layouts.error')

        <form method="POST" action="/facebook-posts/update">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" id="body" value={{ $post->body }} rows="4" name="body" required></textarea>
            </div>

            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-2 col-form-label">Published Date</label>
                <div class="col-10">
                    <input class="form-control" type="datetime-local" value={{ $post->published_date }} id="published_date" name="published_date" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

@endsection
