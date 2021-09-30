<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
* 
*/


?>
<div class="container">
	<div class="jumbotron">
		<h1 class="display-4 text-center">Past Matches</h1>

		<?php 
		// Get past matches from the 'Results' Table.
		require ( 'private/connect_db.php' ) ;

		$q = "SELECT * FROM Results";
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 )
		{				
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
				{
				echo ' <div class="list-group" style="padding-bottom: 20px; background:#FFF">
									<div class="col-12" style="background-color:#334CA4">
											<h5 class="text-center" style="color:#FFF"> ' . $row["match_date"] .' </h5>
									</div>			
									<div class="row">
											<div class="col-4"><p class="text-center"> ' . $row["team1name"] .' </p></div>
											<div class="col-2"><p class="text-center" > ' . $row["team1_score"] .' </p></div>
											<div class="col-2"><p class="text-center"> ' . $row["team2_score"] .' </p></div>
											<div class="col-4"><p class="text-center" > ' . $row["team2name"] .' </p></div>	
									</div>
								</div> ';
				} 			 
		}
		else { echo '<p>Error displaying past match results.</p>' ; }
		mysqli_close( $link ) ;
		?>

	</div>
</div>