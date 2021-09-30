<?php 

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
* In session validation 
*/

// Access session.
session_start() ; 
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adlogin_tools.php' ) ; load('../index.php') ; }

?>