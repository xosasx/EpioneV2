<div class="card">
    <div class="card-block">
        <h4 class="card-title">Sleep</h4>
        <hr>
        <div class="text-center">
            <i class="fa fa-bed fa-4x" aria-hidden="true"></i>
            <!--<p class="h4">90</p>-->
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                    <span></span> <b class="caret"></b>
                </div>
            </li>
        </ul>
        <div class="card-block">
            <!--<form method="POST" action="{{ url('/get/sleep') }}">  -->
                
                <button class="btn btn-primary" data-toggle="modal" data-target="#sleep-log-modal">View Log</button> 
                

                
            <!--</form>-->
        </div>
    </div>
</div>

@push('modals')
<!-- Sleep Log modal -->
<div id="sleep-log-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySleepLogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sleep Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="sleep-graph"></div>
            </div>
        </div>
    </div>
</div>
@endpush