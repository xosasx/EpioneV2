<div class="card">
    <div class="card-block">
        <h4 class="card-title">Body Water</h4>
        <hr>
        <div class="text-center">
            <i class="flaticon-droplet-of-water fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button id="view-bodyWater-button" class="btn btn-primary" data-toggle="modal" data-target="#view-bodyWater-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Body Water log modal -->
<div id="view-bodyWater-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewBodyWaterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Body Water Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="body-water-graph"></div>              
            </div>
        </div>
    </div>
</div>
@endpush