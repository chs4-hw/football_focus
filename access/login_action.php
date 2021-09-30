<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*This is used to process login attempt. inputs are verified with the 
*validate function located in '/access/login_tools.php'.
*On passing the validation check a session will open, signing the user in 
*and loading the '/home.php page'.
*An unsuccessful login will direct the user back to '/index.php'.
*/

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  require ( '../private/connect_db.php' ) ;

  require ( '../access/login_tools.php' ) ;

  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

  if ( $check )  
  {
	session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    $_SESSION[ 'subscript' ] = $data[ 'subscript' ] ;
    $_SESSION[ 'mail_list' ] = $data[ 'mail_list' ] ;
    load ( '../home.php' ) ;
  }
  else {
    include ( '../includes/header.html' ) ;
    echo '<title>Login Error</title>
        </head>
          <body>';

    echo '<div class="container">
            <div class="jumbotron">
              <h1>Error!</h1>
                <p id="err_msg">The following error(s) occurred:<br>' ;
                  foreach ( $errors as $msg )
                  { echo " - $msg<br>" ; }
                  
    echo '<p>Email address and password not found. Please try again or Register</p><br>
    <a class="btn btn-block" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/index.php" role="button">OK</a></div<br>';
    include ( '../includes/footer.html' ) ;
    mysqli_close( $link ); 
    } 

  mysqli_close( $link ) ; 
}


?>