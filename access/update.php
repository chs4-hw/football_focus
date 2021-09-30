<?php
/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Update user form
* Form action: /admin/update_user.php
*/

include ( '../includes/header.html' ) ;
include ( '../access/session.php' ) ;

require ('../private/connect_db.php');

echo '<title>Update Account</title>
      </head>
      <body>';

echo '<div class="container" >' ;
echo '<div class="col-12"  style="background:linear-gradient(#000000,#6A87AB); color:#FFF">' ;

include ( '../includes/navigation.html' ) ;

echo '<h6 style="padding-bottom: 20px; margin-left: 32px;">';
echo "User: {$_SESSION['first_name']} {$_SESSION['last_name']}";
echo '</h6></div>'; 

// Fetch user data and place in form values
$id = mysqli_real_escape_string($link, $_SESSION['user_id']);

$q = 'SELECT * FROM Users WHERE user_id='.$id ;  
  $r = mysqli_query ( $link, $q ) ;
    if ( @mysqli_num_rows( $r ) == 1 ) 
    {
			$row = mysqli_fetch_assoc($r);
			
			
    }
		else { $errors[] = 'User Data not found.' ; 
		}

?>
<div class="container">
	<div class="jumbotron">
		<h1 class="display-4 text-center">Update Account</h1>
			<form action="../access/update_user.php" method="post">

				<input type="text" 
					class="form-control" 
					name="update_id"  
					value="<?php echo $row['user_id']; ?> " hidden> 
				<hr>

				<label>
							First Name:
				</label> 
				<input type="text" 
						class="form-control" 
						name="first_name"  
						value="<?php echo $row['first_name']; ?>"> 
				<hr>

				<label>
							Last Name:
				</label>
				<input type="text" 
						class="form-control" 
						name="last_name"  
						value="<?php 
						echo $row['last_name'];?>">
				<hr>				
				
				<label>
							Email:
				</label>
				<input type="text" 
						class="form-control" 
						name="email"		   
						value="<?php
						echo $row['email']; ?>">
				<hr>
				<div class="checkbox">
					<?php
						if ($row['mail_list'] == 'yes'){
							echo '<input class="form-check-input" type="checkbox" name="value" value="yes" checked>
							<label class="form-check-label">
							You are currently included in the newsletter mail list.</label>
							<label> Deselect to be excluded.</label>';
						}
						else{
							echo '<input class="form-check-input" type="checkbox" name="value" value="yes">
							<label class="form-check-label">
							You are currently excluded in the newsletter mail list.</label>
							<label> Select to be included.</label>';
						}
					
					?>
				</div>	
				<hr>
					<input class="btn btn-lg btn-block" type="submit" name="submit" value="Update Account">
  			<hr>			
			</form>
	</div>
</div>

<?php
include ( '../includes/footer.html' ) ;

?>