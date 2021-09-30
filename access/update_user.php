<?php 

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Update user form action
* Form action: /admin/update_user.php
*/
  
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  require ('../private/connect_db.php'); 

  $errors = array();
  // hidden user_id
  if ( empty( $_POST[ 'update_id' ] ) )
    { $errors[] = '' ; }
    else
    { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'update_id' ] ) ) ; }

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
  // Checkbox
  if (isset($_POST['value']))
    {
      $ml = $_POST['value'];
    }
    else {
      $ml = 'no';
    }
  // Validate email input  
    $q = "SELECT user_id FROM Users WHERE email='$e'";
    $r = mysqli_query ( $link, $q ) ;
    $row = mysqli_fetch_assoc($r);

      if (strcmp($row['user_id'],$id) != 0)
      {
        if ( mysqli_num_rows( $r ) != 0 ) {
          $errors[] = 'Email address already registered. <a href="../access/update.php">OK</a>' ;
          echo 'other user';
        }
        
      }
  // Update Users table    
  if ( empty( $errors ) ) 
  {
    $q = "UPDATE Users 
		SET first_name='$fn', last_name='$ln', email='$e', mail_list='$ml' 
		WHERE user_id='$id'";
		
   $r = @mysqli_query ( $link, $q ) ;
	
    if ($r)
    { include('../includes/header.html');
      echo '<title>Account Update</title>
                </head>
                  <body>';
              
              echo '<div class="container">
                        <div class="col-12" >
                          <div class="jumbotron">
                            <h1 class="text-center">Account Updated</h1>
                              </div>
                                <p>Your account has been updated.</p>
                                  <p>Login to update changes.</p>
                                    <a class="btn btn-lg btn-block" href="../access/logout.php" role="button">OK</a>
                                    </div></div></div><br>';

              include( '../includes/footer.html' ) ; }
    mysqli_close($link); 
   
 }
  else 
  {
    echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
    mysqli_close( $link );
  } 
  
  exit();
}
	
?>