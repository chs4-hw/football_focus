<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*User Logout, end session.
*/
include ( 'session.php' ) ;

include ( '../includes/header.html' ) ;
    echo '<title>Logout</title>
        </head>
          <body>';

$_SESSION = array() ;
session_destroy() ;

echo '<div class="container">
        <div class="jumbotron">
          <h1>Goodbye!</h1>
            <p>You are now logged out.</p>
              <p><a class="btn btn-block" href="../index.php">Login</a></p>
            </div>' ;

include ( '../includes/footer.html' ) ;
?>