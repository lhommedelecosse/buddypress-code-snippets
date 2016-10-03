<?php  // <~ do not copy the opening php tag

add_action( 'woocommerce_after_order_notes', 'wc4bp_custom_checkout_field' );

function wc4bp_custom_checkout_field( $checkout ) {

    global $woocommerce;
  	global $bp;
  
  	$youtubevalue = 'YouTube Video Promotion';
  	$Twitchvalue = 'Twitch Video Promotion';
  	$hitboxvalue = 'Hitbox Video Promotion';

	$user_id = $bp->loggedin_user->id;
  	$items = $woocommerce->cart->get_cart();
    foreach($items as $item => $values) { 
        $_product = $values['data']->post; 
        $thisproduct = $_product->post_title; 
	  
	  	if ( $thisproduct == $youtubevalue ) {
		  	$link = xprofile_get_field_data($youtubevalue,$user_id);
  			$html = '<p>'.$youtubevalue.': '.$link.'</p>';
		} elseif ( $thisproduct == $Twitchvalue ) {
		  	$link = xprofile_get_field_data($Twitchvalue,$user_id);
  			$html = '<p>'.$Twitchvalue.': '.$link.'</p>';
		} elseif ( $thisproduct == $hitboxvalue ) {
		  	$link = xprofile_get_field_data($hitboxvalue,$user_id);
  			$html = '<p>'.$hitboxvalue.': '.$link.'</p>';
		} 
	}
	if (strpos($link, 'href=""') !== false) {
	  	wc_add_notice( sprintf('<strong>You do not have any content to promote!</strong>'), 'error'	);
	} else {
  		echo $html; 
	}
}
