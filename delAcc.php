<?php
session_start();
require('connect.php');

$id = $_GET['id'];
if(isset($_GET['id'])){
	$result = mysqli_query($connection, "DELETE FROM `users` WHERE `ID` = '$id'");
}
session_unset();
header("LOCATION: index.php");
?>