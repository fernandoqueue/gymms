
<?php

if(!function_exists('currentlyImpersonating')){
    function currentlyImpersonating(){
        return session()->has( config('session.impersonation_session_key') );
    }
}