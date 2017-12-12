<div class="card">
    <div class="card-block">
        <h4 class="card-title">Respitory Rate</h4>
        <hr>
        <div class="text-center">
            <i class="flaticon-lungs-with-the-trachea fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button id="view-respitoryRate-button" class="btn btn-primary" data-toggle="modal" data-target="#view-respitoryRate-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Respitory Rate log modal -->
<div id="view-respitoryRate-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewRespitoryRateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Respitory Rate Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="rr-graph"></div>              
            </div>
        </div>
    </div>
</div>
@endpush