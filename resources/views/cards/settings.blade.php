@push('scripts')
<script>
    function updateUserData(){
        $('#submit-profile-settings').html('');
        $('#submit-profile-settings-loader').addClass('loader');

        var formData = {
            'name': $('input[name=name]').val(),
            'gender': $('input[name=gender').val()
        };

        console.log('Gender->' + $('input[name=gender').val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('update.client') }}',
            dataType: 'json',
            data: formData,
            success:function(data){
                refreshData();
                $('#submit-profile-settings').html('Submit');
                $('#submit-profile-settings-loader').removeClass('loader');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                $('#submit-profile-settings').html('Submit');
                $('#submit-profile-settings-loader').removeClass('loader');
                alert("XMLHttpRequest: " + XMLHttpRequest.responseText); alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }  
        });        
    }
</script>
@endpush

<div class="card">
    <div class="card-block">
        <h4 class="card-title">Settings</h4>
        <hr>
        <div class="text-center">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#settings-modal">
                <i class="fa fa-cogs fa-3x" aria-hidden="true"></i>
            </button>  
            
        </div>
    </div>
</div>

<!-- Settings modal -->
<div id="settings-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySettingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsLabel">Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (session('change_good'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('change_good') }}
                    </div>
                @endif

                @if (session('change_bad'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('change_bad') }}
                    </div>
                @endif
                <form>
                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="name" value="{{ $profile->user->fullName }}">
                        </div>
                    </div>
                    <!--<div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Sex</label>
                        <div class="col-sm-10">
                            <select class="form-control form-control-lg" name="gender">
                                <option value="{{ $profile->user->gender }}" selected="selected">{{ $profile->user->gender }}</option>
                                <option value="{{ $altGender = $profile->user->gender == 'MALE' ? 'FEMALE' : 'MALE' }}">{{ $altGender = $profile->user->gender == 'MALE' ? 'FEMALE' : 'MALE' }}</option>
                            </select>
                        </div>
                    </div>-->
                    <hr>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button onclick="updateUserData()" class="btn btn-primary">
                                <div id="submit-profile-settings-loader"></div>
                                <div id="submit-profile-settings">Submit</div>                                
                            </button>
                            <button class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>      
                </form>
            </div>
        </div>
    </div>
</div>