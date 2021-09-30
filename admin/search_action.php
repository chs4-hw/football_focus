<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College

*Displays the data requested based on the inputs set out with 
*the user search form. Results are listed as a table.
	
*/


// Page Headers
include ( 'admin_session.php' ) ;
include ( '../includes/header.html' ) ;

echo '<title>Admin Search</title>
        </head>
            <body>';

include ( 'admin_nav.php' ) ;
?>

    <br>
    <div class="container">
    <div class="jumbotron">
                <h1 class="display-4">User Search</h1>
            </div>
<?php


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{

	include ('../private/connect_db.php');

	if (isset($_POST['value'])){
		$value = $_POST['value'];

	}
	else {
		$value = NULL;
	}

	$errors = array();

	if ( !empty( $_POST['search'] ) ){ 
		$s = mysqli_real_escape_string( $link, trim( $_POST['search'] ) ) ;		 
		}
		else{
			$errors[] = 'Enter your search value' ;
        }
        
        if ($value == 'all')
        {
            $q = "SELECT user_id, first_name, last_name, email, subscript, mail_list, reg_date FROM Users" ;
        } else{
            $q = "SELECT user_id, first_name, last_name, email, subscript, mail_list, reg_date 
            FROM Users WHERE $value='$s'" ;    
        }
		  
		$r = mysqli_query ( $link, $q ) ;
		if ( mysqli_num_rows( $r ) != 0 ){

            echo '<br>
                <div class="container">';
            echo '<table class="table">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Subscription</th>
                                    <th>Mail List</th>
                                    <th>Registration Date</th>
                                </tr>
                            </thead>';
                echo "<tbody>";
            			
			while ($row = mysqli_fetch_assoc($r)) {

                $id = $row['user_id'];

                // show search results
                
                echo "<tr>
                        <td>" .$row['user_id']. "</td>
                        <td>" .$row['first_name']. "</td>
                        <td>" .$row['last_name']. "</td>
                        <td>" .$row['email']. "</td>
                        <td>" .$row['subscript']. "</td>
                        <td>" .$row['mail_list']. "</td>
                        <td>" .$row['reg_date']. "</td>
                        <td>";
                        
                        // Delete button
                            echo '<form action="../admin/delete_user.php" method="post">
                            <input hidden type="text" 
                                class="form-control" 
                                name="delete_id"  
                                value=" '.$id.' "> 
                                <input type="submit" name="delete" value="Delete User" class="btn btn-primary btn-block" role="button"></button>';
                        echo '</form>';
                        // End delete
                        
                        
                echo '</td>
                    </tr>';                
            }
            echo "</tbody>";
            echo "</table>
                    </div>";
		}
		else{
			echo 'No Results for ' . $s . ' in ' . $value;
		}
        mysqli_close($link);
		//exit();	
	}
	
    include ( '../includes/footer.html' ) ;
?>	