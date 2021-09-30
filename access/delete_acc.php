<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Delete user account form.
*/

include ('../includes/header.html');
include ( '../access/session.php' ) ;

echo '<title>Delete Account</title>
      </head>
	  <body>';

echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;
	  
include ( '../includes/navigation.html' ) ;
	  
echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 	  

echo '<div class="container">
<div class="text-center">	
	<img src="../images/pfc_logo.png" class="img-fluid" alt="Peterhead FC Logo">
</div>
	<h1 class="text-center">Remove User Account</h1>
		<form action="../access/delete_action.php" method="post">
			<input 
				type="text" 
				class="form-control" 
				placeholder="Email" 
                name="email"
                value="'.$email.'"
				required>
			<hr>
			<input 
				type="password" 
				class="form-control" 
				placeholder="Password" 
                name="pass"
                value="'.$pass.'"
				required>
			<hr>   
			<input type="submit" name="delete" value="Delete My Account" class="btn btn-lg btn-block" role="button"></button>
			<hr>
			</form>
</div>';

include ( '../includes/footer.html' ) ;

?>