<?php
session_start();
require('connect.php');

if(isset($_POST['username_change'])){
	$username = $_POST['username_change'];
	if($username != ""){
		$user_id = $_SESSION['user_id'];
		$query = mysqli_query($connection, "UPDATE `users` SET `username`='$username' WHERE `ID`='$user_id'");
	}
}

if(isset($_POST['password_change'])){
	$password = $_POST['password_change'];
	if($password != ""){
		$user_id = $_SESSION['user_id'];
		$query = mysqli_query($connection, "UPDATE `users` SET `password`='$password' WHERE `ID`='$user_id'");
	}
}

if(isset($_POST['jscolor'])){
	$bgcolor = $_POST['jscolor'];
	if($bgcolor != '66B2FF'){
		$user_id = $_SESSION['user_id'];
		$query = mysqli_query($connection, "UPDATE `users` SET `background`='$bgcolor' WHERE `ID`='$user_id'");
	}
}

if(isset($_POST['del_acc'])){
	$del_acc = $_POST['del_acc'];
	strtolower($del_acc);
	if($del_acc == "yes"){
		$user_id = $_SESSION['user_id'];
		$query = mysqli_query($connection, "DELETE FROM `users` WHERE `ID` = '$user_id'");
		session_destroy();
		header("LOCATION: /index.php");
	}
}

header("LOCATION: /notes.php");
?>