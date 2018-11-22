<?php
y

//looking for errors first
if( !(isset($_POST['submit'])) ){
	header("Location: ../signup.php");
	exit();
}

include_once 'dbh.inc.php';

$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$last_name = myssqli_real_escape_string($connection, $_POST['last_name']);
$user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
$user_uid = mysqli_real_escape_string($connection, $_POST['uid']);
$user_password = mysqli_real_escape_string($connection, $_POST['password']);

//My first error handler

//Check for empty fields
if( empty($first_name) || empty($last_name) || empty($user_email)
		      ||  empty($user_uid) || empty($user_password)  ) {
	header("Location: ../signup.php?signup=empty"); exit();
}
//checking wheater our character are valid
// preg_match is some  sort equal find of python 
if( !(preg_match("/^[a-zA-Z]*$/", $first_name ) || 
    !(preg_match("/^[a-zA-Z]*$/", $last_name ) {
	header("Location: ../signup.php?signup=invalid");
	exit(); // if i am using exit() Why should I use else ??
}
//Checking  if the email is valid
// function >>  filter_var() << 
if( !(filter_var($email, FILTER_VALIDATE_EMAIL)) ) { header("Location: ../signup.php?signup=invalidEmail"); exit(); }

//cheacking  if the username has already been taken 
if( mysqli_num_rows( mysqli_query($connection, "SELECT * FROM users WHERE user_uid = '$user_uid' ;") ) > 0) {
	header("Location: ../signup.php?signup=userTaken"); exit();
}

// If we were sucessfull in each and every  test we are going to :
//First >>hasing the password
$hashed = password_hash($user_password, PASSWORD_DEFALT);

//now we are going to  INSERT INTO our TABLE
$sql = "INSERT INTO users(first_name, last_name, user_email, user_uid, user_password) VALUES('$first_name', '$last_name', '$user_email', '$user_uid','$hashed');";
mysqli_query($connection, $sql);
header("Location: ../signup.php?signup=sucess"); exit();
