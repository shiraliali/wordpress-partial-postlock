<?php

// Some stuffs defined here 
// Such as Messages,Errors and other values 


// Getting wordpress Site login Url
$login_url = wp_login_url( home_url() );

// Font Awesome Initialize
define('FONTAWESOME', '//kit.fontawesome.com/569c0825a1.js');

define('LOGIN_URL', $login_url);

define('MSG_Login', '<b>Please log in to your account for Access to this Part of post</b><br>');

define('LOCK_ICON', '<i id="lock-icon" class="fas fa-lock"></i>');

define('LOGIN','<i class="fas fa-key"></i><a href="' . LOGIN_URL . '"><strong>  Login To My Account</strong></a>');


?>