<?php
include_once 'dbh.inc.php';

//I must read it 

$user_uid = mysqli_real_escape_string($connection, $_POST['user_id']));
$user_password = mysqli_real_escape_string($connection, $_POST['user_password']));

echo "$user_uid";
echo "$user_password";

