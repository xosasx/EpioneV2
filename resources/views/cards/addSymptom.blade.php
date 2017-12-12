<div class="card">
    <div class="card-block">
        <h4 class="card-title">Add Symptom</h4>
        <hr>
        <div class="text-center">
            <i class="fa fa-thermometer-half fa-4x" aria-hidden="true"></i>
        </div>
        <div class="card-block">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add-symptom-modal">Select</button>
        </div>
    </div>
</div>

@push('modals')
<!-- Add Symptom modal -->
<div id="add-symptom-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addSymptomLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Symptom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="card-columns">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Arms & Legs</h4>
                                <hr>
                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush