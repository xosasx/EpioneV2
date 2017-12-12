<div class="card">
    <div class="card-block">
        <h4 class="card-title">Profile</h4>
        <hr>
        <div class="text-center">
            <div class="thumbnail">
                <img src="{{ $profile['avatar'] }}" alt="Profile_Image" class="img-thumbnail">
            </div>
        </div>                
    </div>
    <div class="card-block text-center">
        <p class="card-text">{{ $profile['name'] }}</p>
    </div>
</div>