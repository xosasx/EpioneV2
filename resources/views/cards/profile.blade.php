<div class="card">
    <div class="card-block">
        <h4 class="card-title">Profile</h4>
        <hr>
        <div class="text-center">
            <div class="thumbnail">
                <img src="{{ $profile->user->avatar }}" alt="Profile_Image" class="img-thumbnail">
            </div>
        </div>                
    </div>
    <div class="card-block text-center">
        <p id="fullname" class="card-text">{{ $profile->user->fullName }}</p>
    </div>
</div>