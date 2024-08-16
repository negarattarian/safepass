<?php
include_once 'app/backend.php';

session_start();
$db = connection();

$user_id = $_SESSION['userid'];

$current_datetime = date('Y-m-d H:i:s');

// Insert log for logout action
$db->query("INSERT INTO logs (action, user_id, datetime) VALUES ('4', '$user_id', '$current_datetime')");

// Unset session variables
unset($_SESSION["username"]);
unset($_SESSION["userid"]);

// Redirect to login page
header("location:login.php");
exit();
?>
