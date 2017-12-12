@if ($isNeedCarer)
    @push('scripts')
        <script>
            var potenCarer;

            function submitAttention()
            {
                $('#select-carer-close-button').html('<div class="loader"></div>');

                var choice = false;
                if($('#carer-choice').find(":selected").val() == 'yes')
                    choice = true;

                var formData = {
                    'isNeedCarer': choice,
                    'carerId': potenCarer,
                    'mobile': $('user-mobile-number').val()
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'{{ route('set.carer.client') }}',
                    data: formData,
                    success:function(data){
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });           
            }

            function selectCarer($id)
            {
                potenCarer = $id;
                $('#select-carer-button-'+ carer +'').html('Selected');
            }

            function displayCarers(carers){
                var html = '<div class="container"><div class="card-columns">';    
                            
                for (var carer in carers){
                    html += '<div class="card">'+
                                '<div class="card-block">'+
                                    '<h4 class="card-title">'+ carers[carer].name +'</h4>'+
                                    '<hr>'+
                                    '<div class="text-center">'+
                                        '<div class="thumbnail">'+
                                            '<img src="{{ $profile->user->avatar }}" alt="Carer_Image" class="img-thumbnail">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="card-block text-center">'+
                                    '<p id="carer-phone-number" class="card-text">'+ carers[carer].mobile +'</p>'+
                                '</div>'+
                                '<div class="card-block>'+
                                    '<button id="select-carer-button-'+ carer +'" class="btn btn-success" onclick="selectCarer("'+ carer +'")">Select</button>'+
                                '</div>'+
                            '</div>';
                }

                html += '</div></div>';

                $('#select-carer').html(html);
            }

            function loadCarers(){
                if($('#carer-choice').find(":selected").val() == 'yes')
                {
                    $('#select-carer').html('');
                    $('#spinner-load-carer').addClass('loader');           

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'GET',
                        url:'{{ route('load.carers.client') }}',
                        dataType : 'json',
                        data: {},
                        success:function(data){
                            displayCarers(data.availableCarers);

                            $('#spinner-load-carer').removeClass('loader');
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            $('#spinner-load-carer').removeClass('loader');
                            alert("XMLHttpRequest: " + XMLHttpRequest.responseText); alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                        }  
                    });
                }                
            }
        </script>
    @endpush

    @push('modals')
    <script>
        $(window).on('load',function(){
            $('#check-carer-modal').modal('show');
            $("#select-carer-close-button").hide();
        });        
    </script>$url = action('App\Http\Controllers\FooController@method');

    <!-- Attention Carer modal -->
    <div id="check-carer-modal" class="modal fade" data-backdrop="static" data-keyboard="false" data-toggle="modal" aria-labelledby="myCheckCarerLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Attention</h5>
                </div>
                <div class="modal-body">
                    <div id="spinner-load-carer"></div>
                    <form>
                        <div class="form-group row">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Please enter your mobile number</label>
                            <div class="col-sm-10">
                                <input id="user-mobile-number" class="form-control form-control-lg" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Would you like a Carer</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-lg" name="carer-choice" id="carer-choice" onchange="loadCarers();">
                                    <option disabled selected>Please Choose...</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div id="select-carer" class="form-group row yes-to-carer" style="display:none;">                            
                        </div>    
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="select-carer-close-button" type="button" class="close yes-to-carer" data-dismiss="modal" aria-label="Close">
                        Complete
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endpush

    @push('end_scripts')
        <script>
            $('#carer-choice').on('change',function(){
                if( $(this).val()==="yes"){
                    $("#select-carer").show();
                    $("#select-carer-close-button").hide();
                }
                else{
                    $("#select-carer").hide();
                    $("#select-carer-close-button").show();
                }
            });
        </script>
    @endpush
@endif