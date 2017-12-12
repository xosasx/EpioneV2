@push('scripts')
<script>
    function hideClientModal($id)
    {
        $($id).removeClass('show');
        $('.modal-backdrop.fade.show').remove();
        $('body').removeClass('modal-open');
        $($id).removeAttr("style");
    }    

    var noteArr = [];

    function sendNote($id)
    {
        if ($('#sendNote-text-area'+$id).val() == null || 
            $('#sendNote-text-area'+$id).val() == ""){
                $('#note-alert-'+$id).html('<div class="alert alert-danger alert-dismissible fade show  ml-1 mr-1" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                    'Sorry!, input field is blank'+
                '</div>');
        }else{
            $('#note-alert-'+$id).html('<div class="loader"></div>');
            var formData = {
                'id': $id,
                'note': $('#sendNote-text-area'+$id).val()
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'{{ route('send.note.carer') }}',
                data: formData,
                success:function(data){
                    $('#note-alert-'+$id).html('<div class="alert alert-success alert-dismissible fade show ml-1 mr-1" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                        'Note has been added'+
                    '</div>');
                    $('#sendNote-text-area'+$id).val('');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    // $('#note-alert-'+$id).html('<div class="alert alert-success alert-dismissible fade show ml-1 mr-1" role="alert">'+
                    //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    //         '<span aria-hidden="true">&times;</span>'+
                    //     '</button>'+
                    //     'Note has been added '+ textStatus + ' || ' + errorThrown+
                    // '</div>');
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }  
            });  
        }         
    }

    function getNotes($id)
    {
        $('#viewNotes'+$id+' > div').html('');
        $('#viewNotes'+$id+' > span').addClass('loader');
        var formData = {
            'id': $id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('get.notes.carer') }}',
            data: formData,
            success:function(data){
                // console.log(data);
                // console.log(data.notes);
                // document.getElementById("spinner-sleep-data").className = "";
                var html ='';
                if (data.notes == null || data.notes == "")
                    html = '<p>You have no notes on this client</p>';
                else{
                    html = '<ul class="list-group"></ul>';
                    var count = 1;
                    noteArr = [];
                    for (var i in data.notes){
                        noteArr.push(i);
                        noteArr.push($id);
                        html += '<li class="list-group-item justify-content-between">'+
                                    '<div>'+count+'. '+data.notes[i]['note']+'</div>'+
                                    '<button id="'+i+'-'+$id+'" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                                '</li>';
                        count++;
                    }                                             
                    
                    html += '</ul>';
                }

                $('#viewNotes'+$id+' > span').removeClass('loader');
                $('#viewNotes'+$id+' > div').html(html);

                for (var i in data.notes)
                    document.getElementById(i+'-'+$id).addEventListener("click", deleteNote, false);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                $('#viewNotes'+$id+' > span').removeClass('loader');
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }  
        });
    }

    function deleteNote()
    {
        var a_id = $(this).attr('id');
        var t_id = a_id.split('-');
        var id = t_id[0];
        var _id = t_id[1];
        $('#'+id).html('<div class="loader"></div>');

        var count = 0;
        for (var i in noteArr){
            if (i == id)
                break;
            count++;
        }

        
        console.log(_id);
        console.log(id);

        var formData = {
            'id': _id,
            'note_id': id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('delete.note.carer') }}',
            dataType: 'json',
            data: formData,
            success:function(data){
                // console.log(data);
                // console.log(data.notes);
                // document.getElementById("spinner-sleep-data").className = "";
                
                getNotes(_id);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                // $('#viewNotes'+id+' > span').removeClass('loader');
                getNotes(_id);
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }  
        });
    }

    function toggleViewSend($type, $id)
    {
        if ($type == "send")
        {
            $('#addNote'+$id).toggle("slow");
            $('#col-notes-'+$id).addClass('col-sm-4');
            $('#col-notes-'+$id).removeClass('col-sm-6'); 
            $('#send-'+$id+' > i').toggleClass('fa-plus fa-minus');           
            $('#send-'+$id).toggleClass('btn-success btn-danger');
            if(!$('#viewNotes'+$id).attr('style')){
                $('#viewNotes'+$id).toggle("slow");
                $('#view-'+$id+' > i').toggleClass('fa-eye-slash fa-eye');
            }
        }else
        {
            if($('#view-'+$id+' > .fa-eye')[0])
                getNotes($id);

            $('#viewNotes'+$id).toggle("slow");
            $('#col-notes-'+$id).toggleClass('col-sm-6 col-sm-4');            
            $('#view-'+$id+' > i').toggleClass('fa-eye fa-eye-slash');
            if(!$('#addNote'+$id).attr('style')){
                $('#addNote'+$id).toggle("slow");
                $('#send-'+$id+' > i').toggleClass('fa-minus fa-plus');
                $('#send-'+$id).toggleClass('btn-danger btn-success');
            }                
        }
    }
</script>
@endpush
<div class="card">
    <div class="card-block">
        <h4 class="card-title">Clients</h4>  
        <div class="row">            
            @forelse ($clients as $client)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">{{ $client['name'] }}</h4>
                        <hr>
                        <div class="text-center">
                            <div class="thumbnail">
                                <img src="{{ $client['avatar'] }}" alt="Profile_Image" class="img-thumbnail">
                            </div>
                        </div>                
                    </div>
                    <div class="card-block">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#clientModal{{ $client['id'] }}112270">View Info</button>
                    </div>
                </div>
            </div>

            @push('modals')
                <div class="client-modal modal" id="clientModal{{ $client['id'] }}112270" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="clientModal{{ $client['id'] }}1122Label" aria-hidden="true">                    
                    <div class="modal-content">
                        <div onclick="hideClientModal('#clientModal{{ $client['id'] }}112270')" class="close-modal-left close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-chevron-left fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="modal-header">
                                        <h3 id="client{{ $client['id'] }}-name" class="modal-title">{{ $client['name'] }}</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="card-title">Mobile</h4>
                                                        <hr>
                                                        <div class="text-center">
                                                            <i class="fa fa-phone fa-4x" aria-hidden="true"></i>              
                                                            <p class="card-text">{{ $client['mobile'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div id="col-notes-{{ $client['id'] }}" class="col-md-4">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="card-title">Notes</h4>
                                                        <hr>
                                                        <div class="text-center">
                                                            <i class="fa fa-sticky-note fa-4x" aria-hidden="true"></i> 
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <button id="view-{{ $client['id'] }}" class="btn btn-primary" onclick="toggleViewSend('view', '{{ $client['id'] }}')">
                                                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <button id="send-{{ $client['id'] }}" class="btn btn-success" onclick="toggleViewSend('send', '{{ $client['id'] }}')">
                                                                    <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>                                                    
                                                    </div>

                                                    <div id="note-alert-{{ $client['id'] }}"></div>                                                    
                                                    
                                                    <div id="viewNotes{{ $client['id'] }}" class="card" style="display: none;">
                                                        <span></span>
                                                        <div></div>
                                                    </div>

                                                    <div id="addNote{{ $client['id'] }}" class="card" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-sm-9"> <!-- ml-1 mr-1 mb-1 style="margin: 0; padding: 8px;" -->
                                                                <textarea id="sendNote-text-area{{ $client['id'] }}" rows="3" style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button class="btn btn-success btn-xs"><i class="fa fa-paper-plane" aria-hidden="true" onclick="sendNote('{{ $client['id'] }}')"></i></button>
                                                            </div>
                                                        </div>  
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Distance Card -->
                                                @include('cards.distance')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- BMI Card -->
                                                @include('cards.bmi')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Body Fat Card -->
                                                @include('cards.bodyFat')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Body Water Card -->
                                                @include('cards.bodyWater')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Blood Pressure Card -->
                                                @include('cards.bloodPressure')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Heart Rate Card -->
                                                @include('cards.heartRate')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- RR Card -->
                                                @include('cards.respiotryRate')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Weight Card -->
                                                @include('cards.weight_')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Temperature Card -->
                                                @include('cards.temperature')
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Sleep Card -->
                                                @include('cards.sleep_')
                                            </div>
                                        </div>

                                                        



                                        <button onclick="hideClientModal('#clientModal{{ $client['id'] }}112270')" type="button" class="btn btn-secondary mt-3" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            @endpush

            @empty
                <p>No Clients At The Time</p>
            @endforelse            
        </div>
    </div>
</div>

@push('modals')
<div class="modal fade" id="viewNotesModal" tabindex="-1" role="dialog" aria-labelledby="viewNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewNotesModalLabel">Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">               
                It works the modal sub!
            </div>
        </div>
    </div>
</div>
@endpush