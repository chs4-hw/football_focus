<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*User login form.
*Form action: /access/login_action.php
*/

session_start() ;

if ( isset( $errors ) && !empty( $errors ) )
	{
		echo '<p id="err_msg">Oops! There was a problem:<br>' ;
		foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
		echo 'Please try again or <a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/register.php">Register</a></p>' ;
	}
?>

<!-- Display body section. -->
<div class="container">
<div class="text-center">	
	<img src="images/pfc_logo.png" class="img-fluid" alt="Peterhaed FC Logo">
</div>
	<h1 class="text-center">User Login</h1>
		<form action="access/login_action.php" method="post">
			<input 
				type="text" 
				class="form-control" 
				placeholder="Email" 
				name="email" 
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
				class="btn btn-lg btn-block" 
				role="button"> Login
			</button>
			<hr>
			</form>

		<a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/register.php"
		class="btn btn-lg btn-block">Register</a>
</div>