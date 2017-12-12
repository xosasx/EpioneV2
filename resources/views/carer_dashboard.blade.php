@extends('layouts.app')

@section('content')
<div class="container">
    @include('cards.carer.clients')    
</div>

<div class ="container mt-3">
    <div class="row">
        <div class="col-sm-4">
            <!-- User Profile Card  -->
            @include('cards.carer.profile')
        </div>

        <div class="col-sm-4">
            <!-- User Notification -->
            @include('cards.carer.notification')
        </div>   
    </div>
</div>

@include('meetTeam')

@endsection