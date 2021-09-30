<!-- Page Content -->
<?php
include ( 'includes/header.html' ) ;
include ( 'access/session.php' ) ;

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*The User Details page.
*
*/

?>

<title>User Details</title>
</head>

<!-- Start Content -->
<body>

<?php

echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;

include ( 'includes/navigation.html' ) ;

echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 

?>
<div class="container">
	<div class="jumbotron">
		<h1 class="display-4 text-center">User Details</h1>

		<div class="container">
				<div class="card">
				<div class="card-header">
					Logged in as:
				</div>
				<div class="card-body">
					<h3 class="card-title text-center">
						<?php
							echo $_SESSION['first_name'];
							echo ' '; 
							echo $_SESSION['last_name'];
							echo '</h3>';
						?>			
					<?php
					if ($_SESSION['subscript'] == yes){

						echo '<p class="card-text text-center"><strong>Current Subscription:</strong> Full Subscription</p>';	

					}
					else{
						echo '<p class="card-text text-center"><strong>Current Subscription:</strong> Partial Subscription</p>';
						echo '<a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/cart.php" class="btn btn-lg btn-block">Upgrade Subscription</a>';
					}
					?>
				</div>
			</div>	
			</div>

	<div class="container">
		<div class="card">
		<div class="card-header">
		</div>
		<div class="card-body">
		<a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/update.php?id=<?php echo $_SESSION['user_id'];?>" class="btn btn-lg btn-block">Update Account</a>
		</div>
	</div>	
	</div>

	<div class="container">
		<div class="card">
		<div class="card-header">
		</div>
		<div class="card-body">
		<a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/access/delete_acc.php?id=<?php echo $_SESSION['user_id'];?>" class="btn btn-lg btn-block">Delete Account</a>
		</div>
	</div>	
	</div>
	</div>
</div>	
		
<!-- End Page Content -->	

<?php
include ( 'includes/footer.html' ) ;

?>