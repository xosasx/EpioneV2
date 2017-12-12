@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        <div class="card">
            <h3 class="card-header">{{ $user['name'] }}</h3>
            <img class="card-img-top" src="{{ $user['avatar'] }}" alt="Profile Image" style="">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $user['email'] }}</li>
            </ul>
            <div class="card-block">
                <p class="card-text">Thank you, for deciding to use our service.</p>
                <p class="card-text">However, to proceed as a Client you will need to sign in to your fitbit account to give us the
                    appropriate permissions to serve you better.</p>
                <a href="{{ route('login.fitbit') }}" type="button" class="btn btn-primary btn-lg">Click here to continue</a>
            </div>
        </div>
    </div>
</div>
@endsection