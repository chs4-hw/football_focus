<!-- Page Content -->
<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*The Home page, starting page for logged in users.
*
*/

include ( 'includes/header.html' ) ;
include ( 'access/session.php' ) ;
?>

<title>Home</title>
</head>

<body>
<!-- Start Content -->
<?php
echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;

include ( 'includes/navigation.html' ) ;

echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 

?>
    
<?php
include ( 'includes/upcoming_match.html' ) ;
include ( 'includes/news.html' ) ;
include ( 'includes/standings_table.html' ) ;
?>
	
<!-- End Page Content -->	

<?php
include ( 'includes/footer.html' ) ;

?>