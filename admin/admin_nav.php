<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College

*Administrator navigation displays the current administrator user session.

*Navigation Links: 
*	/admin/add_player.php
*	/admin/add_match.php
*	/admin/admin_reg.php
*	/admin/admin_logout.php
*/

?>

<!-- Navigation -->
<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <a class="navbar-brand"><?php echo "Admin: {$_SESSION['first_name']} {$_SESSION['last_name']}";?></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin.php">User Management</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_player.php">Add Player</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/add_match.php">Add Match</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/admin_reg.php">Adminstrator Registration</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/admin_logout.php">Logout</a>
			  </li>
			</ul>
		  </div>
		</nav>
	</div>

<!-- End Navigation -->
