<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Administrator mail action to mail newsletter 
*/

include ( '../includes/header.html' ) ;
include ( 'admin_session.php' ) ;

echo '<div class="container" >
                        <div class="col-12" >' ;

include ( 'admin_nav.php' ) ;                       

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
    {
        require ('../private/connect_db.php');

        // Fetch users that receive newsletter.
        $q = "SELECT email FROM Users WHERE mail_list='yes'" ;  
		$r = mysqli_query ( $link, $q ) ;
		if ( mysqli_num_rows( $r ) != 0 ){
            
            echo "<br><table>";            
			
			while ($row = mysqli_fetch_assoc($r)) {
                $to = $row['email']; 

                // Included subject and message.
                include ( 'newsletter.php' ) ;
                
                // Headers
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers = $row['email'];
                $headers = 'From: Focus Football Fan App <HNDSOFTS2A9@gmail.com>';

                // Mail newsletter.
                mail($to,$subject,$message, $headers);

                echo '<title>Admin Users</title>
                </head>    
                <!-- Start Content -->
                <body>';
                echo "<tr><td>Email sent to:</td><td>" .$row['email']. "</td></tr>";
            }
		}
		else{
			echo 'No Results';
        }

        echo '</table>';
        echo '<a class="btn btn-primary btn-block" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin.php">OK</a>';

        mysqli_close($link);
    }
include ( '../includes/footer.html' ) ;    
?>	