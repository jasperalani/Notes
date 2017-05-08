<?php
require('connect.php');
session_start();

$username = $_SESSION['username'];
$result = mysqli_query($connection, "SELECT `ID` FROM `users` WHERE `username` = '$username'");

$row = mysqli_fetch_array($result);
$_SESSION['user_id'] = $row[0];

$url = "notes.php";
header( "Location: $url" );

?>