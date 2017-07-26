@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <ul class="panel-post-navigation">
            <li><a href="{{ URL::to('facebook-posts/create') }}">Create Facebook Posts</a></li>
        </ul>
    </div>
    <div class="col-sm-8 blog-main">
        <h3>Connected Accounts:</h3>
        @foreach($users['connected'] as $account)
            <div class="account-data">
                <div class="service_provider">{{ $account['provider']['name'] }}</div>
                <div class="service_provider_user">{{ $account['user_name'] }}</div>
            </div>
        @endforeach
    </div>

    <div class="col-sm-8 blog-main">
        <h3>Not Connected Accounts:</h3>
        @foreach($users['not_connected_providers'] as $key => $provider)
            <div class="provider-data">
                <div class="service_provider"><a href="/redirect/{{ $provider['machine_name'] }}" >{{ $provider['name'] }}</a></div>
            </div>
        @endforeach
    </div>
@endsection
