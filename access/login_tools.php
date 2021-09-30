<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*User login form functions.
*/

// Function to load default URL.
function load( $page = 'http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A9' )
{
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] );
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page ;
  header( "Location: $url" ) ; 
  exit() ;
}

// Function to validate email address and password. 
function validate( $link, $email = '', $pass = '')
{
  $errors = array() ; 
  if ( empty( $email ) ) 
  { $errors[] = 'Enter your email address.' ; } 
  else  { $e = mysqli_real_escape_string( $link, trim( $email ) ) ; }

  if ( empty( $pass ) ) 
  { $errors[] = 'Enter your password.' ; } 
  else { $p = mysqli_real_escape_string( $link, trim( $pass ) ) ; }

  if ( empty( $errors ) ) 
  {
    $q = "SELECT user_id, first_name, last_name, subscript, mail_list 
    FROM Users WHERE email='$e' AND pass=SHA1('$p')" ;  
    $r = mysqli_query ( $link, $q ) ;
    if ( @mysqli_num_rows( $r ) == 1 ) 
    {
      $row = mysqli_fetch_array ( $r, MYSQLI_ASSOC ) ;
      return array( true, $row ) ; 
    }
    else { $errors[] = 'Email address and password not found.' ; }
  }
  return array( false, $errors ) ; 
}