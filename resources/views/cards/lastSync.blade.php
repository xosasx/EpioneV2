@push('scripts')
<script>
    function refreshData(){
        document.getElementById("spinner-refresh").className = "loader";
        document.getElementById("refresh_but").className = "";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:'{{ route('refresh.client') }}',
            dataType : 'json',
            data: {},
            success:function(data){
                $("#fullname").html(data.profile.user.fullName);
                $("#last-sync").html(data.lastSyncDate);

                document.getElementById("spinner-refresh").className = "";
                document.getElementById("refresh_but").className = "fa fa-refresh fa-1x";
            }
        });
    }
</script>
@endpush

<div class="card">
    <div class="card-block">
        <h4 class="card-title">Last Sync</h4>
        <hr>
        <div class="text-center">
            <button type="button" class="btn btn-secondary" onclick="refreshData()">
                <div id="spinner-refresh"></div>
                <i id="refresh_but" class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            </button>                        
            <p id="last-sync">{{ $lastSyncDate }}</p>
        </div>
    </div>
</div>