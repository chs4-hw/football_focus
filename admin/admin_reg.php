<title>Admin Register</title>
</head>
        
<!-- Start Content -->
<body>

<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College

*Administrator form where new administrator users can be registered and added to the 'Administrator' table.
* Form action: /admin/admin_reg.php

*/

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
  {
    require ('../private/connect_db.php'); 
  
    $errors = array();
	
    if ( empty( $_POST[ 'first_name' ] ) )
		{ $errors[] = 'Enter your first name.' ; }
		else
		{ $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

    if (empty( $_POST[ 'last_name' ] ) )
		{ $errors[] = 'Enter your last name.' ; }
		else
		{ $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

    if ( empty( $_POST[ 'username' ] ) )
		{ $errors[] = 'Enter your Username.'; }
		else
		{ $u = mysqli_real_escape_string( $link, trim( $_POST[ 'username' ] ) ) ; }

    if ( !empty($_POST[ 'pass1' ] ) )
    {
      if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
      { $errors[] = 'Passwords do not match.' ; }
      else
      { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
    }
    else { $errors[] = 'Enter your password.' ; }
    
    if ( empty( $errors ) )
		{
		  $q = "SELECT user_id FROM Administrator WHERE username='$u'" ;
		  $r = @mysqli_query ( $link, $q ) ;
		  if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Username already registered.' ;
		}
    
    if ( empty( $errors ) ) 
		{
		$q = "INSERT INTO Administrator (first_name, last_name, username, pass, reg_date) VALUES ('$fn', '$ln', '$u', SHA1('$p'), NOW() )";
		$r = @mysqli_query ( $link, $q ) ;
		if ($r)
			{ echo '<div class="container">
					  <div class="col-12" >
						<div class="container bg-success text-white">
						  <h1>Registered</h1>
							<p>Administrator table registered a new user.</p>
							<p>Name: '.$fn.' '.$ln.' Username: '.$u.' </p><br>
							  <a class="btn btn-primary btn-block" href="admin_reg.php" role="button">OK</a><br></div></div></div><br>'; }
		  
			mysqli_close($link); 
			//exit(); 
			}
	// Report errors.
	else 
		{
		echo '<div class="container">
					  <div class="col-12" >
						<div class="container bg-warning text-dark">
						  <h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;

				  foreach ( $errors as $msg )
				  { echo " - $msg<br>" ; }
				  echo 'Please try again.</p><br>
					<a class="btn btn-primary btn-block" href="admin_reg.php" role="button">OK</a>';
					echo '</div></div></div><br>';

		mysqli_close( $link );
		}
   
}

include ( '../includes/header.html' ) ;
include ( 'admin_session.php' ) ;

echo '<div class="container">
        <div class="col-12" >' ;

include ( 'admin_nav.php' ) ;

?>
<br>
<div class="container">
<div class="jumbotron">
			<h1 class="display-4">Administrator Registration</h1>
		</div>

<form action="admin_reg.php" method="post">
	<h1>Create Account</h1>
    
	<input type="text" 
		class="form-control" 
		placeholder="First name"
		name="first_name" 
		required size="20" 
		value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
	<hr>

	<input type="text" 
		class="form-control" 
		placeholder="Last name"
		name="last_name" 
		required size="20" 
		value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
	<hr>				
	
	<input type="text" 
		class="form-control" 
		placeholder="Email" 
		name="username" 
		required 
		size="20" 
		value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
	<hr>				
	
	<input type="password" 
	  class="form-control" 
		placeholder="Create Password" 
		name="pass1" 
		required size="20" 
		value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
	<hr>				
	
	<input type="password" 
	  class="form-control" 
		placeholder="Confirm Password" 
		name="pass2" 
		required size="20" 
		value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
	<hr>				
	<input class="btn btn-primary btn-block" type="submit" value="Create Account">
  <hr>			
</form>
</div>

<?php

include( '../includes/footer.html' ) ;

?>
