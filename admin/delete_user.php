<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Administrator delete user action. 
*/
 
include ( 'admin_session.php' ) ;
include ( '../includes/header.html' ) ;

echo '<title>Admin Search</title>
        </head>
            <body>';

include ( 'admin_nav.php' ) ;

require ( '../private/connect_db.php' ) ;

if (isset($_POST['delete']))
{
    $delete_id = mysqli_real_escape_string($link, $_POST['delete_id']);

    $q = "DELETE FROM Users WHERE user_id ={$delete_id}";  

    if (mysqli_query($link, $q)) {
        echo '<div class="container-fluid">
        <div class="col-12" >
          <div class="container bg-warning text-dark">
            <h1>User Deleted</h1><br>
                <a class="btn btn-primary btn-block" href="../admin.php" role="button">OK</a><br></div></div></div><br>';
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
    
    mysqli_close($link);
} 

include( '../includes/footer.html' ) ;
?>