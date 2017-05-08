<?php
require('connect.php');

$id = $_GET['id'];
if(isset($_GET['id'])){
	$result = mysqli_query($connection, "DELETE FROM `notes` WHERE `ID` = '$id'");
}

header("LOCATION: notes.php");
?>