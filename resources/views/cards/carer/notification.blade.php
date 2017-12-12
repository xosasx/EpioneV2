@push('scripts')
<link rel="stylesheet" 
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    
    function toggleNotification()
    {
        var _id = $(this).attr('id');
        var id = "."+_id;
        $(id).toggle("slow");
    }

    function notiCheck()
    {
        $(this).html('<div class="loader"></div>');
        var id = $(this).attr('id');        
        // console.log(id);
        var formData = {
            'id': id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('update.response.notification.carer') }}',
            data: formData,            
            success:function(data){
                // $(this).html('');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // $(this).html('');
                alert("XMLHttpRequest: " + XMLHttpRequest.responseText); alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }  
        });

        $(this).html('');
    }

    var __noti = ''; 

    function displayNotifications(){
        $('#show-notifications').html('');
        $('#spinner-notification').addClass('loader');
        
        notis = __noti;  

        var html = '';
        var list = '';
        for (var noti in notis){
            html += '<ul class="list-group mb-2">';
            
            var count = 0;
            console.log(notis[noti]);
            for  (var _l in notis[noti]){
                console.log(notis[noti][_l]);
                // console.log(notis[noti][_l].date);                
                list += '<li style="display: none;" class="list-group-item client'+noti+'-list-group ';                

                if (notis[noti][_l].type == "Warning")
                    list += 'list-group-item-warning';                                    
                else if (notis[noti][_l].type == "Danger")
                    list += 'list-group-item-danger';                                   
                
                list += ' justify-content-between">'+notis[noti][_l].message;       

                if(!notis[noti][_l].response){
                    list += '<span><i class="fa fa-phone" aria-hidden="true"></i>   '+notis[noti][_l].mobile+'</span>'+
                            '<button id="'+noti+'/'+_l+'" style="margin=0; padding=0;" type="button" class="btn btn-outline-success">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>Attend'+
                            '</button';                    
                    count++;
                }
                
                list += '</li>';
            }
            // onclick="toggleNotification(.'+noti+'-list-group'+')"
            
            var name = $('#client'+noti+'-name').text();

            html += '<li class="list-group-item justify-content-between">'+
                        name +
                        '<span class="badge badge-default badge-pill">'+count+'</span>'+
                        '<button id="client'+noti+'-list-group" style="margin=0; padding=0;" type="button" class="btn btn-outline-secondary">'+
                            '<i class="fa fa-chevron-down" aria-hidden="true"></i>'+
                        '</button>'+
                    '</li>'+
                    list + 
                    '</ul>';
        }
        
        $('#show-notifications').html(html);
        $('#spinner-notification').removeClass('loader');

        for (var noti in notis)
            document.getElementById('client'+noti+'-list-group').addEventListener("click", toggleNotification, false);

        for  (var _l in notis[noti]){
            if(!notis[noti][_l].response)
                document.getElementById(noti+'/'+_l).addEventListener("click", notiCheck, false);
        }
            
    }

    // Runs every 8s
    setInterval(function() {     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:'{{ route('notification.carer') }}',
            dataType : 'json',
            data: {},
            success:function(data){
                //console.log(data);
                if(data.notifications != "" ){                    
                    __noti = data.notifications;

                    var isNoti = false;
                    for (var noti in __noti){
                        for  (var _l in __noti[noti]){
                            if(!__noti[noti][_l].response){
                                $('#notifcation-card').addClass('card-inverse card-danger');
                                $('#notfication-icon').addClass('infinite animated wobble');
                                isNoti = true;
                                break;                                
                            }
                        }
                    }

                    if(!isNoti){
                        $('#notifcation-card').removeClass('card-inverse card-danger');
                        $('#notfication-icon').removeClass('infinite animated wobble');
                    }                    
                }      
                else{
                    $('#show-notifications').html('No notifcations at this time');
                    $('#notifcation-card').removeClass('card-inverse card-danger');
                    $('#notfication-icon').removeClass('infinite animated wobble');
                } 
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // $('#spinner-notification').removeClass('loader');
                // alert("XMLHttpRequest: " + XMLHttpRequest.responseText); alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }  
        });
    }, 2000);
</script>
@endpush

<div id="notifcation-card" class="card">
    <div class="card-block">
        <h4 class="card-title">Notifications</h4>
        <hr>
        <div class="text-center">
            <i id="notfication-icon" class="fa fa-bell fa-4x" aria-hidden="true"></i>
        </div>                
    </div>
    <div class="card-block">
        <button onclick="displayNotifications()" id="view-notifications-button" class="btn btn-primary" data-toggle="modal" data-target="#view-notifications-modal">View</button>
    </div>
</div>

@push('modals')
<!-- Noftications modal -->
<div id="view-notifications-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewNotificationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="spinner-notification"></div>
                <div id="show-notifications"></div>
                <!-- <ul class="list-group">
                    <li class="list-group-item justify-content-between">
                        Conner Smith
                        <span class="badge badge-default badge-pill">0</span>
                        <button id="client100215073596927610169-list-group" style="margin=0; padding=0;" type="button" class="btn btn-outline-secondary">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li style="margin-left = 23px;" class="list-group-item 100215073596927610169-list-group list-group-item-warning">Heart rate is higher than usual</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
@endpush