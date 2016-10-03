<?php  // <~ do not copy the opening php tag

/*Make sure profile is default component*/
define('BP_DEFAULT_COMPONENT','profile');

/*let us filter where to redirect */
add_filter("login_redirect","bpdev_redirect_to_profile",10,3);
 
function bpdev_redirect_to_profile($redirect_to_calculated,$redirect_url_specified,$user) {
    if(empty($redirect_to_calculated))
	   $redirect_to_calculated=admin_url();
 
    /*if the user is not site admin,redirect to his/her profile*/
    if(!is_site_admin($user->user_login))
        return bp_core_get_user_domain($user->ID );
    else
    return $redirect_to_calculated; /*if site admin or not logged in,do not do anything much*/
}
