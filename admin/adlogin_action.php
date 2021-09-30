<?php 

/**
 * 
 * Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College

*Process the administrator login attempt.
*Inputs from 'admin_login.php' are processed with the function
*validate 'admin/adlogin_tools.php'.
*Successful login starts an administrator session and loads '/admin.php'.
*Unsuccessful login remains on the '/admin/admin_login.php' page.  
	
*/ 

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
		require ( '../private/connect_db.php' ) ;
		require ( '../admin/adlogin_tools.php' ) ;

		list ( $check, $data ) = validate ( $link, $_POST[ 'username' ], $_POST[ 'pass' ] ) ;

		if ( $check )  
			{
				session_start();
				$_SESSION[ 'admin_id' ] = $data[ 'admin_id' ] ;
				$_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
				$_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
				load ( '../admin.php' ) ;
			}
		else { echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
			foreach ( $errors as $msg )
				{ echo " - $msg<br>" ; }
			echo 'Email address and password not found. Please try again or Register</p></div>';
			mysqli_close( $link ); } 

		mysqli_close( $link ) ; 
	}
include ( 'admin_login.php' ) ;
?>