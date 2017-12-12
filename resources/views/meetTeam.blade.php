@push('modals')
<!-- Team modal -->
<div id="meet-team-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="meetTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">The Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @forelse ($team as $member)
                        <div class="col-sm-4 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <div class="text-center">
                                        <div class="thumbnail">
                                            <img src="{{ $member['avatar'] }}" alt="Profile_Image" class="img-thumbnail">
                                        </div>
                                        <hr>
                                        <h4>{{ $member['name'] }}</h4>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4>Sorry can't display the Team Members at this time</h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endpush