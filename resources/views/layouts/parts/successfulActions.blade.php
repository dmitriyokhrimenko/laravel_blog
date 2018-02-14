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



<!--Successful Users group delete-->
@if(Session::has('change_status'))
    <div id="successful-change-status" class="alert alert-success">
        <h4 class="text-center">{{Session::get('change_status')}}</h4>
    </div>
@endif

<!--Successful User addition-->
@if(Session::has('successful-addition'))
    <div id="successful-addition" class="alert alert-success">
        <h5 class="text-center">{{Session::get('successful-addition')}}</h5>
    </div>
@endif

<!--Successful clearing a table-->
@if(Session::has('successful-truncate'))
    <div id="successful-truncate" class="alert alert-danger">
        <h5 class="text-center">{{Session::get('successful-truncate')}}</h5>
    </div>
@endif

<!--Successful clearing a table-->
@if(Session::has('successful-load'))
    <div id="successful-load" class="alert alert-success">
        <h5 class="text-center">{{Session::get('successful-load')}}</h5>
    </div>
@endif
