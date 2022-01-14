@if(session('admin_impersonation')) 
<div style="background-color: blue" class="row">
    <div class="col-12 container">
        <p style="color:white; float: right; margin-bottom:unset;">
            Impersonation Mode
            <a style="padding-left: 5px; color:aquamarine" href="{{ route('tenant.impersonate.auth.destroy') }}">Go back</a>
        </p>
        
    </div>
</div>
@endif