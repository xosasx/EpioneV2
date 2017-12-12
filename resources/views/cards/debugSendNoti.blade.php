@push('scripts')
<script>
    function debugSendNoti(){
        var _type = $('#send-debug-notification-type').val(), _message = $('#send-debug-notification-message').val();
        $('#send-debug-notification-button').html('<div class="loader"></div>');

        if(_type != "" && _type != null && _message != "" && _message != null)
        {
            var formData = {
                'type': _type,
                'message': _message
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'{{ route('send.notification.client') }}',
                data: formData,
                success:function(data){
                    $('#send-debug-notification-message').val('Notification Sent!');
                    $('#send-debug-notification-button').html('Send');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $('#send-debug-notification-message').val('Notification Failed!');
                    $('#send-debug-notification-button').html('Send');
                    alert("XMLHttpRequest: " + XMLHttpRequest.responseText); alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }  
            }); 
        }               
    }
</script>
@endpush

<div class="card">
    <div class="card-block">
        <h4 class="card-title">Debug Only!, Send Notification</h4>
        <hr> 
        <div class="row text-center">
            <div class="form-group">
                <div class="col-md-12 mb-2">
                    <select id="send-debug-notification-type" class="form-control">
                        <option disabled selected>Please choose notification type...</option>
                        <option>Warning</option>
                        <option>Danger</option>                                    
                    </select>   
                </div>
                <div class="col-md-12 mb-2">
                    <input id="send-debug-notification-message" class="form-control" type="text" placeholder="Enter message here...">
                </div>
                <div class="col-md-4">
                    <button id="send-debug-notification-button"class="btn btn-primary" onclick="debugSendNoti()">Send</button>
                </div>
            </div> 
        </div>
    </div>    
</div>