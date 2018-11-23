<?php

//testing if the user clicked on our button
if(  !(   isset($_POST['submit']) ) ){
	header("Location: ../index.php?button=false");
	exit();
}
//getting our variables
include_once 'dbh.inc.php';

$user_uid = mysqli_real_escape_string($connection, $_POST['user_uid']);
$user_password = mysqli_real_escape_string($connection ,$_POST['user_password']);

//checking if we have a empty field
if( empty($user_uid) || empty($user_password) ){ header("Location: ../index.php?empty=true"); exit();}

//checking if the username or email exists on our table
$query = "SELECT * FROM users WHERE user_uid = '$user_uid' OR user_email = '$user_uid';";
if(mysqli_num_rows( mysqli_query($connection, $query) )  <= 0 ){ header("Location: ../index.php?user=NOT_FOUND"); exit();}

//hashing password
$hashed = password_hash($user_password, PASSWORD_DEFAULT);

$query = "SELECT * FROM users WHERE user_password = '$hashed';";
$found = mysqli_num_rows( mysqli_query($connection, $query ) );
echo "$found";
