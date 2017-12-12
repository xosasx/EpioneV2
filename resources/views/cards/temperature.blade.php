<div class="card">
    <div class="card-block">
        <h4 class="card-title">Temperature</h4>
        <hr>
        <div class="text-center">
            <i class="fa fa-thermometer-half fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button class="btn btn-primary" data-toggle="modal" data-target="#temperature-log-modal">View Log</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Temperature Log modal -->
<div id="temperature-log-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addTemperatureLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Temperature Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="temperature-graph"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush