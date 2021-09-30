<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College

*Administrator logout and end current session.
	
*/

include ( 'admin_session.php' ) ;

include ( '../includes/header.html' ) ;
    echo '<title>Logout</title>
        </head>
          <body>';

$_SESSION = array() ;
session_destroy() ;

echo '<div class="container">
        <div class="jumbotron">
          <h1>Logout</h1>
            <p>You are now logged out.</p>
              <p><a class="btn btn-primary btn-block" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/admin_login.php">Login</a></p>
            </div>' ;

include ( '../includes/footer.html' ) ;

?>