<div class="card">
    <div class="card-block">
        <h4 class="card-title">BMI - Body Mass Index</h4>
        <hr>
        <div class="text-center">
            <i class="flaticon-standing-human-body-silhouette fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button id="view-bmi-button" class="btn btn-primary" data-toggle="modal" data-target="#view-bmi-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- BMI log modal -->
<div id="view-bmi-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewBMILabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">BMI Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="bmi-graph"></div>              
            </div>
        </div>
    </div>
</div>
@endpush