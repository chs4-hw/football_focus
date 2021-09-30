<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Update to full subscription.
* 
*/

// Update to full subscription.

    include ( '../access/session.php' ) ;      
    require ('../private/connect_db.php');
    $id = mysqli_real_escape_string($link, $_SESSION['user_id']);

    // Get SHA1() key from cart.php
    if ( isset( $_GET['key'] )){

        //Subsciption variable
        $sb = 'yes';
        
        // Check key
        if($key=SHA1($_SESSION['user_id']))
        {
            if ( empty( $errors )) 
            {
                $q = "UPDATE Users 
                SET subscript='$sb' 	
                WHERE user_id='$id'";  
                $r = mysqli_query ( $link, $q ) ;


                $_SESSION['subscript'] = 'yes';

                mysqli_close($link);
                header ('Location: http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/receipt.php');
            }
        }
              
    }
    else{
        echo 'An error has occurred, please contact an administrator';
    }         
?>