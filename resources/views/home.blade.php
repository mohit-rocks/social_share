@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <ul class="panel-post-navigation">
                        <li><a href="{{ URL::to('facebook-posts/') }}">Facebook Posts</a></li>
                        <li><a href="{{ URL::to('twitter-posts/') }}">Twitter Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
