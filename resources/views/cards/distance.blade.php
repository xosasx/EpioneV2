<div class="card">
    <div class="card-block">
        <h4 class="card-title">Distance</h4>
        <hr>
        <div class="text-center">
            <i class="flaticon-distance fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button id="view-distance-button" class="btn btn-primary" data-toggle="modal" data-target="#view-distance-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Distance log modal -->
<div id="view-distance-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewDistanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Distance Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div id="spinner-distance"></div> -->
                <div>                    
                    <div id="distance-charts"></div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endpush