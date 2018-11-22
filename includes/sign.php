<?php
//looking for errors first
if( !(isset($_POST['submit'])) ){
	header("Location: ../signup.php");
	exit();
}
//Defining my variables
include_once 'dbh.inc.php';
/*
  	Probably if I solf my $connection issue I'll solve this as well 
	>> mysqli_real_escape_string($connection, $_POST['first_name']);
*/

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_uid = $_POST['user_uid'];
$user_password = $_POST['user_password'];

//Checking for empty fields
if(  empty($first_name) || empty($last_name) || empty($user_email) ||  empty($user_uid) || empty($user_password)  ) {
	header("Location: ../signup.php?signup=empty"); exit();
}

//checking wheater our character are valid
if( !preg_match("/^[a-zA-Z]*$/", $first_name ) || 
    !preg_match("/^[a-zA-Z]*$/", $last_name ) ){
	header("Location: ../signup.php?signup=invalid"); exit();
}

//Checking  if the email is valid
if( !filter_var($user_email, FILTER_VALIDATE_EMAIL) ) {
	header("Location: ../signup.php?signup=invalidEmail"); exit();
}	
	
//cheacking  if the username has already been taken 
/* << Must install phpMyAdimfirt!!
if( mysqli_num_rows( mysqli_query($connection, "SELECT * FROM users WHERE user_uid = '$user_uid' ;") ) > 0) {
	header("Location: ../signup.php?signup=userTaken"); exit();
}
*/
// If we were sucessfull in each and every  test we are going to :

//Setting up the values that we are going to insert into users table
$hashed = password_hash($user_password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users(first_name, last_name, user_email, user_uid, user_password) VALUES('$first_name', '$last_name', '$user_email', '$user_uid','$hashed');";

//Inserting our values
/* First i must fix my connection issue
mysqli_query($connection, $sql);
header("Location: ../signup.php?signup=sucess"); exit();
*/
?>
