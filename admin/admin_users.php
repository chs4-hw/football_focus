<?php

/**
*
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*
*
*Form action: 
*	/admin/mail_action.php   : mail a newsletter to all the users that have opted in to receiving the newsletter.
*	/admin/search_action.php : search the 'Users' table and list the results with an option to delete a user or users.
*/

?>

<br>	
<!-- Administrator User Tables Form -->
<div class="container">
		<div class="jumbotron">
			<h1 class="display-4">Administrator (User Management)</h1>
		</div>

		<form action="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/mail_action.php" method="post">
          <input type="submit" name="mail" value="Mail Newsletter" class="btn btn-primary btn-block" role="button"></button>
 		</form>

	<form action="http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9/admin/search_action.php" method="post">	
		<fieldset  class="form-group">
			<h2 for="inputEmail3" class="col-sm-2 col-form-label">Search Form</h2>

			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios1" value="all">
			  <label class="form-check-label" for="gridRadios1">
				Display All Users
			  </label>
        </div>
			
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios1" value="user_id">
			  <label class="form-check-label" for="gridRadios1">
				User ID
			  </label>
        </div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios2" value="first_name" >
			  <label class="form-check-label" for="gridRadios2">
				First Name
			  </label>
        </div>

			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios3" value="last_name" >
			  <label class="form-check-label" for="gridRadios3">
				Surname
			  </label>
			</div>

			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios4" value="email" >
			  <label class="form-check-label" for="gridRadios4">
				Email
			  </label>
			</div>

			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios5" value="subscript" >
			  <label class="form-check-label" for="gridRadios4">
				Subscription
			  </label>
			</div>

			<div class="form-check">
			  <input class="form-check-input" type="radio" name="value" id="gridRadios6" value="mail_list" >
			  <label class="form-check-label" for="gridRadios4">
				Mail List
			  </label>
			</div>

			<input type="text" class="form-control" placeholder="Search" name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>">
			<button type="submit" class="btn btn-primary btn-block" role="button">Search</button>
		</fieldset>
	</form>		
</div>				
<!-- End Administrator User Tables Form -->