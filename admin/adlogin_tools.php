<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College


*Functions that are used with the login of the administrator:

*Function 'load' setup the default load page or root.
*/ 

function load( $page = 'http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9' ){

	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

	$url = rtrim( $url, '/\\' ) ;
	$url .= '/' . $page ;

	header( "Location: $url" ) ; 
	exit() ;
}

/**
*
*Function 'validate' check and validate the administrator login inputs.

*/ 

function validate( $link, $username = '', $pass = ''){
	$errors = array() ; 

	if ( empty( $username ) ) 
		{ $errors[] = 'Enter your Username.' ; } 
	else  { $u = mysqli_real_escape_string( $link, trim( $username ) ) ; }

	if ( empty( $pass ) ) 
		{ $errors[] = 'Enter your password.' ; } 
	else { $p = mysqli_real_escape_string( $link, trim( $pass ) ) ; }

	if ( empty( $errors ) ){
		$q = "SELECT admin_id, first_name, last_name FROM Administrator WHERE username='$u' AND pass=SHA1('$p')" ;  
		$r = mysqli_query ( $link, $q ) ;
		
		if ( mysqli_num_rows( $r ) != 0 ){
			$errors[] = 'Email address and password not found.' ;
		}	
		if ( @mysqli_num_rows( $r ) == 1 ){
			$row = mysqli_fetch_array ( $r, MYSQLI_ASSOC ) ;
			return array( true, $row ) ; 
		}
	}
	return array( false, $errors ) ; 
}