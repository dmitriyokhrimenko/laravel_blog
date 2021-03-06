<!--Successful post save-->
@if(Session::has('post_saved'))
    <div id="successful-save" class="alert alert-success successful-save">
        <h5 class="text-center">{{Session::get('post_saved')}}</h5>
    </div>
@endif

<!--Successful post delete-->
@if(Session::has('post_deleted'))
    <div id="successful-delete" class="alert alert-danger successful-delete">
        <h5 class="text-center">{{Session::get('post_deleted')}}</h5>
    </div>
@endif

<!--Successful post update-->
@if(Session::has('post_updated'))
    <div id="successful-update" class="alert alert-info successful-update">
        <h5 class="text-center">{{Session::get('post_updated')}}</h5>
    </div>
@endif

<!--Successful change status-->
@if(Session::has('change_status'))
    <div id="successful-change-status" class="alert alert-success successful-change-status">
        <h4 class="text-center">{{Session::get('change_status')}}</h4>
    </div>
@endif

<!--Successful profile update-->
@if(Session::has('profile_update'))
    <div id="successful-profile-update" class="alert alert-success successful-profile-update">
        <h5 class="text-center">{{Session::get('profile_update')}}</h5>
    </div>
@endif

<!--Successful profile delete-->
@if(Session::has('profile_delete'))
    <div id="successful-profile-delete" class="alert alert-danger successful-profile-delete">
        <h5 class="text-center">{{Session::get('profile_delete')}}</h5>
    </div>
@endif
