@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="row justify-content-between">
        <div class="col-md-4 align-self-center">
            <!-- User Profile Card  -->
            @include('cards.profile')
        </div>
        <div class="col-md-6">
            <!-- Health Gauge Card -->
            @include('cards.healthGauge')
        </div>
    </div>

    <div class="card-columns mt-3">
        <!-- Carer -->
        @include('cards.carer')

        <!-- Heart Monitor Card -->        
        @include('cards.heartRate')
        
        <!-- Debug Send Notification -->
        @include('cards.debugSendNoti')

        <!-- Sleep Monitor Card -->
        @include('cards.sleep')    
        
        <!-- Distance Card -->
        @include('cards.distance')

        <!-- Weight Card -->
        @include('cards.weight')

        <!-- Last Sync Card -->
        @include('cards.lastSync')

        <!-- Settings Card -->
        @include('cards.settings')

        <!-- Temperature Card -->
        @include('cards.temperature')

        <!-- Steps Card -->
        @include('cards.steps') 

        <!-- Blood Pressure Card -->
        @include('cards.bloodPressure')

        <!--  Respitory Rate Card -->
        @include('cards.respiotryRate')

        <!-- BMI Card -->
        @include('cards.bmi')

        <!-- Body Fat Card -->
        @include('cards.bodyFat')

        <!-- Body Water Card -->
        @include('cards.bodyWater')
        
        @include('meetTeam')
    </div>
</div>
@endsection