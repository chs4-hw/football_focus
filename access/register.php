<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*User registration form linked from '/access/login.php'.
*Form action: /access/register.php
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

  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

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
    $q = "SELECT user_id FROM Users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered.
        <a class="btn btn-lg btn-block" href="../index.php" role="button">Login</a>' ;
  }

  // Subscription
  $sb = 'no';
  // mail list
  $ml = 'yes';
  
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO Users (first_name, last_name, email, pass, subscript, mail_list, reg_date)
     VALUES ('$fn', '$ln', '$e', SHA1('$p'),'$sb','$ml', NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { include('../includes/header.html');

      echo '<title>Registered</title>
        </head>
          <body>';
      
      echo '<div class="container">
                <div class="col-12" >
                  <div class="jumbotron">
                    <h1 class="text-center">Registered!</h1>
		                  </div>
                        <p>You are now registered.</p>
                          <a class="btn btn-lg btn-block" href="../index.php" role="button">Login</a>
                            </div></div><br>';

      include( '../includes/footer.html' ) ;
    }
  
    mysqli_close($link); 

     
    exit();
  }
  else 
  {
    echo '<div class="container-fluid" style="background-color: #979797">
            <div class="col-12" >
              <div class="container">
                <h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '</div></div></div><br>';
    mysqli_close( $link );

  }  
}

$page_title = 'Register';
include('../includes/header.html');

echo '<div class="container">
        <div class="col-12" >' ;


?>
<br>
<div class="container">
<div class="jumbotron">
 <h1 class="text-center">Create Account</h1>
		</div>


<!-- User Registration. -->

<form action="register.php" method="post">
	<div class="container">   
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
        name="email" 
        required 
        size="20" 
        value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
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
    <input class="btn btn-lg btn-block" type="submit" value="Submit">
    <hr>
  </div>			
</form>
</div>

<?php
include( '../includes/footer.html' ) ;

?>
