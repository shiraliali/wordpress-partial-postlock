<?php
/*
Plugin Name: wp-partial-postlock
Plugin URI: https://github.com/shiraliali/wordpress-partial-postlock
Description: Lock a part of your post with easiest possible way
Author: ali shirali 
Author URI: https://github.com/shiraliali
Text Domain: wp-partial-postlock
Version: 1.0.0
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
    wp_enqueue_script( 'fontawsomeicons', FONTAWESOME );

}
add_action( 'wp_enqueue_scripts', 'wp_partial_lockpost_css' );


// Include init.php file
include( plugin_dir_path( __FILE__ ) . 'define/init.php');


 // Start Function 
 // This function will Make the shortcode And the Message
 // $content is your post content
 
 function lock_post( $atts, $content = null ) {

 if ( is_user_logged_in()) {
	 
// If user already logged in , The content will be shown to user
 return $content;

 } else {

    ob_start();
	 
// The Message in Post will shown when User is Not Logged in 
// You can Add more messages or using your custom shortcodes by using echo
?>

<!-- Message Section box styled with css/style.css loaded as div class -->
<div class="login-section">
	<?php
	 
// Login Message	 
echo MSG_Login;
	 
// Getting Login Wordpress url and displaying url as Clickable link	 
echo LOGIN;

// Lock Icon using font awsome that will showing in right side Inside Login section Box	 
echo LOCK_ICON; ?>

</div>
<?php
 }

 return ob_get_clean();

 } 
// Shortcode created, it will be [lockpost] 
add_shortcode( 'lockpost', 'lock_post' );
