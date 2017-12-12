<div class="card">
    <div class="card-block">
        <h4 class="card-title">Steps</h4>
        <hr>
        <div class="text-center">
            <i class="flaticon-human-footprint fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button id="view-steps-button" class="btn btn-primary" data-toggle="modal" data-target="#view-steps-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Steps log modal -->
<div id="view-steps-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewStepsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Steps Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div id="spinner-steps"></div> -->
                <div>
                    
                    <div id="steps-bar-graph"></div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endpush