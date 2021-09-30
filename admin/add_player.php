<title>Add Player</title>
</head>
        
<!-- Start Content -->
<body>

<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*/

// Form to add football players to 'Player' table.
// Form action: /admin/add_player.php


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
		require ('../private/connect_db.php');
		
		$errors = array();
		
		if ( empty( $_POST[ 'player_name' ] ) )
			{ $errors[] = 'Enter Player Name.' ; }
			else
			{ $pn = mysqli_real_escape_string( $link, trim( $_POST[ 'player_name' ] ) ) ; }
	
		if ( empty( $_POST[ 'player_pos' ] ) )
			{ $errors[] = 'Enter Player Postion.' ; }
			else
			{ $pp = mysqli_real_escape_string( $link, trim( $_POST[ 'player_pos' ] ) ) ; }
	
		if ( empty( $_POST[ 'player_age' ] ) )
			{ $errors[] = 'Enter Player Age.' ; }
			else
			{ $pa = mysqli_real_escape_string( $link, trim( $_POST[ 'player_age' ] ) ) ; }
		
		if ( empty( $_POST[ 'player_dob' ] ) )
			{ $errors[] = 'Enter Player Date of Birth.' ; }
			else
			{ $pd = mysqli_real_escape_string( $link, trim( $_POST[ 'player_dob' ] ) ) ; }
		
		
		if ( empty( $errors ) ) 
			{
			$q = "INSERT INTO Player (player_name, player_pos, player_age, player_dob) VALUES ('$pn', '$pp', '$pa', '$pd')";
			$r = @mysqli_query ( $link, $q ) ;
			if ($r)
			{ echo '<div class="container-fluid">
					  <div class="col-12" >
						<div class="container bg-success text-white">
						  <h1>Player Added</h1>
							<p>Player added to table.</p>
							  <a class="btn btn-primary btn-block" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_player.php" role="button">OK</a><br></div></div></div><br>'; }
		  
			mysqli_close($link);  
			}
			// Report errors.
			else 
			{
			echo '<div class="container-fluid">
						  <div class="col-12" >
							<div class="container bg-warning text-dark">
							  <h1>Error!</h1><p id="err_msg">The following error(s) occurred while adding player details:<br>' ;

					  foreach ( $errors as $msg )
					  { echo " - $msg<br>" ; }
					  echo 'Please try again.</p><br>
			<a class="btn btn-primary btn-block" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_player.php" role="button">OK</a><br></div></div></div><br>';

			  mysqli_close( $link );
			}
			
		   
	}
	
include ( '../includes/header.html' ) ;
include ( 'admin_session.php' ) ;

echo '<div class="container">
        <div class="col-12" >' ;

include ( 'admin_nav.php' ) ;	
	
?>

<br>
<div class="container">
<div class="jumbotron">
			<h1 class="display-4">Add Player</h1>
		</div>

<div class="container">

	<form action="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_player.php" method="post">	
		<fieldset  class="form-group">
			<h2 for="input" class="col-sm-2 col-form-label">Add Player</h2>

			<div>
			  <input type="text" class="form-control" placeholder="Player Full Name" name="player_name" value="<?php if (isset($_POST['player_name'])) echo $_POST['player_name']; ?>" required>
			</div>
			
			<div>
			  <input type="text" class="form-control" placeholder="Player Postion" name="player_pos" value="<?php if (isset($_POST['player_pos'])) echo $_POST['player_pos']; ?>" required>
			</div>
			
			<div>
			  <input type="text" class="form-control" placeholder="Player Age" name="player_age" value="<?php if (isset($_POST['player_age'])) echo $_POST['player_age']; ?>" required>
			</div>
			
			<div>
			<label>
				Player Date of Birth
			</label>
			  <input type="text" class="form-control" placeholder="DD Month YYYY" name="player_dob" value="<?php if (isset($_POST['player_dob'])) echo $_POST['player_dob']; ?>" required>
			</div>
			<button type="submit" class="btn btn-primary btn-block" role="button">Add Player</button>
		</fieldset>
	</form>

</div>

<?php

# Display footer section.
include( '../includes/footer.html' ) ;

?>		