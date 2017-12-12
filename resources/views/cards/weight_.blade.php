<div class="card">
    <div class="card-block">
        <h4 class="card-title">Weight</h4>
        <hr>
        <div class="text-center">
            <i class="flaticon-dumbbell fa-4x" aria-hidden="true"></i>              
            <p class="card-text">89 KG</p>
        </div>
        <div class="card-block">
            <button id="view-weight-button" class="btn btn-primary" data-toggle="modal" data-target="#view-weight-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Weight log modal -->
<div id="view-weight-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewWeightLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Weight Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="weight-graph"></div>              
            </div>
        </div>
    </div>
</div>
@endpush