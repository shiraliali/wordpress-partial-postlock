<?php
/*
Plugin Name: wp-partial-postlock
Plugin URI: https://github.com/shiraliali/wordpress-partial-postlock
Description: Lock a part of your post with easiest possible way
Author: ali shirali 
Author URI: https://github.com/shiraliali
Text Domain: wp-partial-postlock
Version: demo 0.0.1
*/


/*
Css Stylesheet and FontAwsome will loaded here
*/
function wp_partial_lockpost_css() {
	
    // Getting Plugin Directory URL
    $plugin_url = plugin_dir_url( __FILE__ );
	
    // Loading Plugin style from css folder in plugin directory
    wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
    
    // Loading Font Awsome kit from fontawsome cloud servers	
    wp_enqueue_script( 'fontawsomeicons', '//kit.fontawesome.com/569c0825a1.js' );

}
add_action( 'wp_enqueue_scripts', 'wp_partial_lockpost_css' );

 // Start Function 
 // This function will Make the shortcode And the Message
 // $content is your post content
 
 function lock_post( $atts, $content = null ) {

 if ( is_user_logged_in()) {
	 
// If user already logged in , The content will be shown to user
 return $content;

 } else {

    ob_start();
	 
// Getting wordpress Site login Url
    $login_url = wp_login_url( home_url() );
	 
// The Message in Post will shown when User is Not Logged in 
// You can Add more messages or using your custom shortcodes by using echo
?>

<!-- Message Section box styled with css/style.css loaded as div class -->
<div class="login-section">
	<?php
	 
// Login Message	 
echo '<b>Please log in to your account for Access to this Part of this post</b><br>';
	 
// Getting Login Wordpress url and displaying url as Clickable link	 
echo '<i class="fas fa-key"></i><a href="' . $login_url . '"><strong>  Login To My Account</strong></a>';

// Lock Icon using font awsome that will showing in right side Inside Login section Box	 
echo '<i style="opacity:0.3;font-size:4em;float:right;margin-top:auto;margin-bottom:auto;right:5px;" class="fas fa-lock"></i>' ?>
</div>
<?php
 }

 return ob_get_clean();

} 
// Shortcode created, it will be [lockpost] 
add_shortcode( 'lockpost', 'lock_post' );
