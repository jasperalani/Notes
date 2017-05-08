<?php
session_start();
require('connect.php');
if($_SESSION['authenticated'] != true){
	$url = 'index.php';
	header( "Location: $url" );
}else{

	$username = $_SESSION['username'];
	if (isset($_POST['name']) and isset($_POST['note'])){

		$name = $_POST['name'];
		$note = $_POST['note'];
		$id = $_SESSION['user_id'];

		$query = "INSERT INTO `notes`(`user_id`, `name`, `note`) VALUES ('$id', '$name','$note')";
		$result2 = mysqli_query($connection, $query) or die("error" . mysqli_error($connection));
		
		$url = 'notes.php';
		header("Location: $url");
	}
}
?>
<html>
<head>
	<title>Notes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<style type="text/css">
		.form input, .form textarea {
			font-family: "Roboto", sans-serif;
			outline: 0;
			background: #f2f2f2;
			width: 100%;
			border: 0;
			margin: 0 0 15px;
			padding: 15px;
			box-sizing: border-box;
			font-size: 14px;
		}
		.form {
			max-width: 360px;
   	 		margin: 8% auto 100px;
   	 		display: block;
		}
	</style>
</head>
<body>
	<a href="notes.php" id="new">Back</a>
	<div class="form">
		<form class="form-signin" method="POST" id="note">
			<h2 class="form-signin-heading">Add Note</h2>
			<div class="input-group">
				<input type="text" name="name" class="form-control" placeholder="Name" required>
				<textarea name="note" form="note" class="form-control" placeholder="Enter note" required></textarea>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
		</form>
	</div>
</div>
</body>
</html>