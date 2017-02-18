@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Create a task</h1>

        <form method="POST" action="/tasks">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="body">Create task</label>
                <textarea class="form-control" id="body" rows="3" name="body"></textarea>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="completed" id="completed">
                    Completed
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>

    </div>


@endsection
