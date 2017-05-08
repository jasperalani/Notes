<?php
session_start();
require('connect.php');

$result1 = $_SESSION['id'];
$name = $_SESSION['name'];
$note = $_SESSION['note'];

$query = "INSERT INTO `notes`(`user_id`, `name`, `note`) VALUES ('$result1', '$name','$note')";
$result = mysqli_query($connection, $query) or die("error" . mysqli_error($connection));

$url = 'notes.php';
header("Location: $url");