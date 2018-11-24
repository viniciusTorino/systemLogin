<?php
//looking for errors first
if( !(isset($_POST['submit'])) ){
	header("Location: ../signup.php");
	exit();
}

include 'dbh.inc.php';

//Defining my variables
$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
$user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
$user_uid = mysqli_real_escape_string($connection, $_POST['user_uid']);
$user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

//Checking for empty fields
if(  empty($first_name) || empty($last_name) || empty($user_email) ||  empty($user_uid) || empty($user_password)  ) {
	header("Location: ../signup.php?signup=empty"); exit();
}

//checking if our character are valid
if( !preg_match("/^[a-zA-Z]*$/", $first_name ) || 
    !preg_match("/^[a-zA-Z]*$/", $last_name ) ){
	header("Location: ../signup.php?signup=invalid"); exit();
}

//Checking  if the email is valid
if( !filter_var($user_email, FILTER_VALIDATE_EMAIL) ) {
	header("Location: ../signup.php?signup=invalidEmail"); exit();
}	

//checking if the username already exists
if( mysqli_num_rows( mysqli_query($connection, "SELECT * FROM users WHERE user_uid = '$user_uid' ;") ) > 0) {
	header("Location: ../signup.php?signup=userTaken"); exit();
}
///hashing password
$hashed = password_hash($user_password, PASSWORD_DEFAULT);

//definig our insertion
$sql = "INSERT INTO users(first_name, last_name, user_email, user_uid, user_password) VALUES('$first_name', '$last_name', '$user_email', '$user_uid','$hashed');";

//inserting our data into loginSystem database
mysqli_query($connection, $sql);

#done -- we are gold
header("Location: ../signup.php?signup=sucess");

?>
