 <?php
/*
Plugin Name: wp-partial-lockpost
Plugin URI: https://github.com/shiraliali
Description: Lock a part of your post with easiest possible way
Author: ali shirali 
Author URI: https://github.com/shiraliali
Text Domain: wp-partial-lockpost
Version: demo 0.0.1
*/


/*
Loadin CSS Style
*/
   // <script src="https://kit.fontawesome.com/569c0825a1.js"></script>

function wp_partial_lockpost_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
    wp_enqueue_script( 'fontawsomeicons', '//kit.fontawesome.com/569c0825a1.js' );

}
add_action( 'wp_enqueue_scripts', 'wp_partial_lockpost_css' );

 // Start Function 
 // This function will Make the shortcode And the Message
 // $content is your post content
 
 function lock_post( $atts, $content = null ) {

 if ( is_user_logged_in()) {

 return $content;

 } else {

    ob_start();
    $login_url = wp_login_url( home_url() );
// The Message in Post will shown when User is Not Logged in 
// You can Add more messages or Other shortcodes by using echo
?>
<div class="login-section">
	<?php
echo '<b>Please log in to your account for Access to this Part of this post</b><br>';
echo '<i class="fas fa-key"></i><a href="' . $login_url . '"><strong>  Login To My Account</strong></a>';
echo '<i style="opacity:0.3;font-size:4em;float:right;margin-top:auto;margin-bottom:auto;right:5px;" class="fas fa-lock"></i>' ?>
</div>
<?php
 }

 return ob_get_clean();

} 

add_shortcode( 'lockpost', 'lock_post' );