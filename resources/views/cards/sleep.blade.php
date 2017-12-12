@push('scripts')
<script>
    function displaySleepData(sleepArr){
        var html = '   <table class="table">  '  + 
            '       <thead>  '  + 
            '           <tr>  '  + 
            '               <th>#</th>  '  + 
            '               <th>Duration</th>  '  + 
            '               <th>Efficiency</th>  '  + 
            '               <th>Date Of Sleep</th>  '  + 
            '           </tr>  '  + 
            '       </thead>  '  +
            '       <tbody>  ';

        var count = 1;
        for (var i = 0; i < sleepArr.length; i++){
            html += '           <tr>  ' +
                '               <th scope="row">'+ count +'</th>  '  + 
                '               <td>'+ sleepArr[i].duration +'</td>  '  + 
                '               <td>'+ sleepArr[i].efficiency +'</td>  '  + 
                '               <td>'+ sleepArr[i].dateOfSleep +'</td>  ' +
                '           </tr>';
            count++;
        }

        if (sleepArr.length == 0){
            html += '<tr><td colspan="4">Nothing, to display within this range</td></tr>';
        }

        html += '       </tbody>  '  + 
            '  </table>  ';

        $('#sleepContent').html(html);
    }

    function getSleepData(){
        document.getElementById("spinner-sleep-data").className = "loader-lg";
        $('#sleepContent').html("");

        var formData = {
            'beforeDate': $('input[name=beforeDate]').val(),
            'afterDate': $('input[name=afterDate]').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('sleep.get.client') }}',
            dataType: 'json',
            data: formData,
            success:function(data){
                console.log(data);
                document.getElementById("spinner-sleep-data").className = "";

                var sleepArr = data.sleep.sleep;                   
                displaySleepData(sleepArr);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }  
        });        
    }
</script>
<!-- Include Required Prerequisites Date-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endpush

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
                <input type="hidden" id="beforeDate" name="beforeDate" value="" required>
                <input type="hidden" id="afterDate" name="afterDate" value="" required>
                <div class="justify-content-between">
                    <button onclick="getSleepData()" class="btn btn-primary" data-toggle="modal" data-target="#sleep-data-modal">Submit</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#sleep-log-modal">View Log</button> 
                </div>

                
            <!--</form>-->
        </div>
    </div>
</div>

@push('modals')
<!-- Sleep data modal -->
<div id="sleep-data-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySleepDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sleep Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="spinner-sleep-data"></div>
                <div id="sleepContent"></div>
            </div>
        </div>
    </div>
</div>

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

@push('end_scripts')
<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#beforeDate').val(start.format('YYYY-MM-DD'));
            $('#afterDate').val(end.format('YYYY-MM-DD'));
        }

        $('#reportrange').daterangepicker({ //'input[name="sleepRange"]'
            startDate: start,
            endDate: end,
            ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);      
    });
</script>
@endpush