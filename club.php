<!-- Page Content -->

<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*The Club page.
*
*/

include ( 'access/session.php' ) ;
include ( 'includes/header.html' ) ;

echo '<title>The Club</title>
	</head>
	<body>';

	//	Start Content
echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;


include ( 'includes/navigation.html' ) ;

echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 

if ($_SESSION['subscript'] == yes)
{
	// load full subscription
	require ('private/connect_db.php');

	echo '<div class="container">';
	echo '<div class="container">
			<div id="accordion">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h3 class="mb-0 ">
							<button class="btn btn-lg btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<h4 class="float-left">Player Profiles</h4><h3><i class="far fa-plus-square float-right" style="padding-top:5px;"></i><h3>
							</button>
						</h3>
					</div>

					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							<div class="list-group">
								<h3 class="display-3 w3-text-sand">Players</h3>';
	// Fetch data from Player table
	$q = "SELECT * FROM Player";
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
		{
			echo '<div class="list-group" style="padding-bottom: 5px; background:#FFF">
						<div class="col-12" style="background-color:#334CA4">	
								<h5 class="card-title" style="color:#FFF"> ' . $row['player_name'] .' </h5></div>
								<div class="list-group" style="padding-bottom: 10px; background:#FFF">
									<p><strong>' . $row['player_pos'] . '</strong></p>
								<p><i>Date of Birth: '. $row['player_dob'].'( ' . $row['player_age'] . ' )</i></p>
							</div>
						</div>';
		}
	}
	else {echo '<div class="container"><h1 class="dispaly">No data available</h1></div>'; }	

	echo '				</div>
					</div>
				</div>
			</div><br>';
			include ( 'includes/club_news.html' ) ;
	echo '<br></div><br>';
		
}
else
{
	// load partial subscription
	echo '<div class="container">
			<div class="jumbotron">
				<h1 class="display-4 text-center">The Club</h1<div class="container">';
	echo '<div class="container">
			<h3 class="dispaly">This Page is limited to <strong>Full Membership Subscribers</strong>.</h3>
			<h5>To upgrade click the link below.</h5>
			<a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/user.php">
			<button class="btn btn-lg btn-block" id="buttons">Get Full Membership</button></a></div></div>';
}

include ( 'includes/footer.html' ) ;
?>
