
@extends('layout')

@section('content')
    <div class="container content">
        <h3>Task id : {{$task->id}}</h3>
        <ul>
            <li>{{ $task->body }}</li>
        </ul>
    </div>

@endsection
