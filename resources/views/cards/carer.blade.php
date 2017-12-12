@isset($records)
<div class="card">
    <div class="card-block">
        <h4 class="card-title">Carer</h4>
        <hr>
        <div class="text-center">
            <div class="thumbnail">
                <img src="{{ $carer['avatar'] }}" alt="Carer_Profile_Image" class="img-thumbnail">
            </div>
        </div>                
    </div>
    <div class="card-block text-center">
        <p class="card-text">{{ $carer['name']}}</p>
    </div>
    <div class="card-block text-center">
        <p class="card-text">{{ $carer['mobile']}}</p>
    </div>
</div>
@endisset