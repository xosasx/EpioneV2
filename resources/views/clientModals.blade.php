@push('modals')
<!-- Blood Pressure log modal -->
<div id="view-bloodPressure-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewBloodPressureLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Blood Pressure Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="blood-pressure-graph"></div>             
            </div>
        </div>
    </div>
</div>


@endpush