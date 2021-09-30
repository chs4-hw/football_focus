<title>Add Match</title>
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

// Form to add match to 'Results' table.
// Form action: /admin/add_match.php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
		require ('../private/connect_db.php');
		
		$errors = array();
		
		if ( empty( $_POST[ 'team1name' ] ) )
			{ $errors[] = 'Enter the first teams name.' ; }
			else
			{ $t1 = mysqli_real_escape_string( $link, trim( $_POST[ 'team1name' ] ) ) ; }
		
		if ( empty( $_POST[ 'team2name' ] ) )
			{ $errors[] = 'Enter the second teams name.' ; }
			else
			{ $t2 = mysqli_real_escape_string( $link, trim( $_POST[ 'team2name' ] ) ) ; }
		
		if ( empty( $_POST[ 'team1_score' ] ) )
			{ $errors[] = 'Enter the first teams number goals scored.' ; }
			else
			{ $s1 = mysqli_real_escape_string( $link, trim( $_POST[ 'team1_score' ] ) ) ; }
		
		if ( empty( $_POST[ 'team2_score' ] ) )
			{ $errors[] = 'Enter the secound teams number goals scored.' ; }
			else
			{ $s2 = mysqli_real_escape_string( $link, trim( $_POST[ 'team2_score' ] ) ) ; }
		
		if ( empty( $_POST[ 'match_date' ] ) )
			{ $errors[] = 'Enter the date of the match.' ; }
			else
			{ $md = mysqli_real_escape_string( $link, trim( $_POST[ 'match_date' ] ) ) ; }
		
		if ( empty( $errors ) ) 
		{
		$q = "INSERT INTO Results (team1name, team2name, team1_score, team2_score, match_date) VALUES ('$t1', '$t2', '$s1', '$s2', '$md' )";
		$r = @mysqli_query ( $link, $q ) ;
		if ($r)
		{ echo '<div class="container-fluid">
				  <div class="col-12" >
					<div class="container bg-success text-white">
					  <h1>Match Added</h1>
						<p>Match Results added to table.</p>
						  <a class="btn btn-primary btn-block" href="add_match.php" role="button">OK</a><br></div></div></div><br>'; }
	  
		mysqli_close($link); 
		}
		// Report errors.
		else 
		{
		echo '<div class="container-fluid">
					  <div class="col-12" >
						<div class="container bg-warning text-dark">
						  <h1>Error!</h1><p id="err_msg">The following error(s) occurred while trying to add match results:<br>' ;

				  foreach ( $errors as $msg )
				  { echo " - $msg<br>" ; }
				  echo 'Please try again.</p><br>
					<a class="btn btn-primary btn-block" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_match.php" role="button">OK</a><br></div></div></div><br>';

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
			<h1 class="display-4">Add Match</h1>
		</div>
		
<div class="container">	
	<form action="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_match.php" method="post">	
		<fieldset  class="form-group">
			<h2 for="input" class="col-sm-2 col-form-label">Add Match</h2>

			<div>
			  <input type="text" class="form-control" placeholder="Team 1 Name" name="team1name" value="<?php if (isset($_POST['team1name'])) echo $_POST['team1name']; ?>" required>
			</div>
			
			<div>
			  <input type="text" class="form-control" placeholder="Team 2 Name" name="team2name" value="<?php if (isset($_POST['team2name'])) echo $_POST['team2name']; ?>" required>
			</div>
			
			<div>
			  <input type="text" class="form-control" placeholder="Number of goals scored by Team 1" name="team1_score" value="<?php if (isset($_POST['team1_score'])) echo $_POST['team1_score']; ?>" required>
			</div>
			
			<div>
			  <input type="text" class="form-control" placeholder="Number of goals scored by Team 2" name="team2_score" value="<?php if (isset($_POST['team2_score'])) echo $_POST['team2_score']; ?>" required>
			</div>
			
			<div>
			<label>
				Date of Match
			</label>
			  <input type="text" class="form-control" placeholder="DD Month YYYY" name="match_date" value="<?php if (isset($_POST['match_date'])) echo $_POST['match_date']; ?>" required>
			</div>

			<button type="submit" class="btn btn-primary btn-block" role="button">Add Match</button>
		</fieldset>
	</form>
</div>
	
<?php

# Display footer section.
include( '../includes/footer.html' ) ;

?>
