
<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Delete user from table action.
*/

include ( 'session.php' ) ;
require ('../private/connect_db.php');

$_SESSION = array() ;
session_destroy() ;

if (isset($_POST['delete']))
{
    $e = mysqli_real_escape_string($link, $_POST['email']);
    $p = mysqli_real_escape_string($link, $_POST['pass']);

    $q = "DELETE FROM Users WHERE email='$e' AND pass=SHA1('$p')";  

    if (mysqli_query($link, $q)) {
        
        include('../includes/header.html');

      echo '<title>Remove Account</title>
        </head>
          <body>';
      
      echo '<div class="container">
                <div class="col-12" >
                  <div class="jumbotron">
                    <h1 class="text-center">Sorry to see you go.</h1>
		                  </div>
                          <a class="btn btn-lg btn-block" href="../index.php" role="button">Login</a>
                            </div></div></div><br>';

      include( '../includes/footer.html' ) ;


    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
    mysqli_close($link);     
}

?>