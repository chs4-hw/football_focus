<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College

*Administrator login form.

*Default login details: 
*Username = Admin
*Password = 123

*Form action: /admin/adlogin_action.php
*    	
*/ 

session_start() ;

$page_title = 'Administrator Login' ;
include ( '../includes/header.html' ) ;

if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or register a new administrator account</a></p>' ;
}
?>

<!-- Display body section. -->
<div class="container">
	<h1>Administrator Login</h1>
	<p><strong>This page is for Focus Football administrators only</strong></p>
		<form action="adlogin_action.php" method="post">
			<input 
				type="text" 
				class="form-control" 
				placeholder="Username" 
				name="username" 
				required>
			<hr>
			<input 
				type="password" 
				class="form-control" 
				placeholder="Password" 
				name="pass" 
				required>
			<hr>   
			<button 
				type="submit" 
				class="btn btn-primary btn-block" 
				role="button"> Login In
			</button>
			<hr>
			</form>		
</body>
</html>
<?php
include ( '../includes/footer.html' ) ;
?>