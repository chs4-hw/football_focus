<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Display receipt once full subscription is purchased.
*/

include ( '../access/session.php' ) ;
include ( '../includes/header.html' ) ;
echo '</head>
	<body>';

if ($_SESSION['subscript'] == yes)
    {
        echo '<div class="container" >' ;
        echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;

        include ( '../includes/navigation.html' ) ;

        echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
        echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
        echo '</h6></div>'; 

            echo '<div class="container">
                    <div class="card">
                    <div class="card-header">
                        Receipt
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center">';

                                echo $_SESSION['first_name'];
                                echo ' '; 
                                echo $_SESSION['last_name'];
                                echo '</h3><h5>';
                                echo 'Cost: £5.00';
                                echo '</h5>
                                <p>Enjoy Full Subscription.</p>
                    </div>
                </div>';

    }
else
    {
        // load partial subscription option
        echo '<div class="container">
                <h3>This Page is limited to <strong>Full Membership Subscribers</strong>.</h3>
                <h5>To upgrade click the link below.</h5>
                <a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/user.php">
                <button class="btn btn-lg btn-block" id="buttons">Get Full Membership</button></a></div></div>';
    }

include ( '../includes/footer.html' ) ;      
?>