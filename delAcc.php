<?php
require('connect.php');
session_start();

$id = $_GET['id'];
if(isset($_GET['id'])){
	$result = mysqli_query($connection, "DELETE FROM `users` WHERE `ID` = '$id'");
}

session_destroy();
header("LOCATION: /index.php");
?>