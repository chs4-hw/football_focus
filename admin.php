<!-- Page Content -->
<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Location: /admin.php
*
*Main page once the administrator has logged in.
*
*/

// Access session.
session_start() ; 
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin/adlogin_tools.php' ) ; load('index.php') ; }

include ( 'includes/header.html' ) ;

?>

<title>Admin Users</title>
</head>

<!-- Start Content -->
<body>

<?php

echo '<div class="container" >
        <div class="col-12" >' ;

include ( 'admin/admin_nav.php' ) ;
include ( 'admin/admin_users.php' ) ;

?>	
<!-- End Page Content -->	

<?php
include ( 'includes/footer.html' ) ;

?>