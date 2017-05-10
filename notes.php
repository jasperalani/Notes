<?php 
session_start();
require('connect.php');

function debug_to_console( $data ) {
	$output = $data;
	if ( is_array( $output ) )
		$output = implode( ', ', $output);
	echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

if($_SESSION['authenticated'] != true){
	$url = 'index.php';
	header( "Location: $url" );
}else{
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
	}

	$query = mysqli_query($connection, "SELECT `background` FROM `users` WHERE `ID` = '$user_id'");
	if($query){
		if(mysqli_num_rows($query) < 1){
			$_SESSION['background'] = "66B2FF";
		}
		$row = mysqli_fetch_array($query);
		$_SESSION['background'] = $row[0];
		$background = $_SESSION['background'];
	}

	$query = mysqli_query($connection, "SELECT `username` FROM `users` WHERE `ID` = '$user_id'");
	if($query){
		$row = mysqli_fetch_array($query);
		$username = $row[0];
		$username = ucfirst($username);
	}

	$notes = array();

	$result = mysqli_query($connection, "SELECT `name`, `note`, `ID`, `date` FROM `notes` WHERE `user_ID` = '$user_id'");
	$notesAmount = mysqli_num_rows($result);

	for($x = 0; $x < $notesAmount; $x++){
		$data = mysqli_fetch_assoc($result);

		//debug_to_console(array_values($data)[0]);
		//debug_to_console(array_values($data)[1]);

		$temp = array(array_values($data)[0], array_values($data)[1], array_values($data)[2], array_values($data)[3]);
		array_push($notes, $temp);
	}

	$result = mysqli_query($connection, "SELECT `name` FROM `notes` WHERE `user_ID`='$user_id'");
	$num_of_notes = mysqli_num_rows($result);

	//debug_to_console(array_values($notes)[0]);
}
?>
<html>
<head>
	<title>Notes</title>
	<link rel="stylesheet" type="text/css" href="style.php">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
	<div class="dropdown">
		<img src="gear.png" class="dropbtn" style="width: 25px; float: left">
		<div class="dropdown-content">
			<a id="logout" href="settings.php">Settings</a>
			<a id="logout" href="logout.php">Logout</a>
		</div>
	</div>
	<div class="dropdown1" style="float: right;">
		<img src="info2x.png" class="dropbtn1" style="width: 25px; float: left">
		<div class="dropdown-content1">
			<p><?php if(isset($num_of_notes)){
						if($num_of_notes != 0){ 
							if($num_of_notes == 1){
								echo "1 note"; 
							}else{
								echo $num_of_notes, "&nbsp;notes";
							}
						}else{
							echo "No notes";
						}
					}?></p>
		</div>
	</div>
	<div class="title">
		<h1>Notes</h1>
		<a id="new" href="new.php">new note</a><br>
		<?php
		if(sizeof($notes) == 0){
			if(isset($username)){
				echo '<p style="margin-top: 100px; color: white;">Welcome, ', $username,'. You have no notes.</p>';
			}else{
				echo '<p style="margin-top: 100px; color: white;">You have no notes.</p>';
			}
		}
		for($x = 0; $x < sizeof($notes); $x++){
			$temp = array_values($notes)[$x];
			$name_ = array_values($temp)[0];
			$note_ = array_values($temp)[1];
			$id_ = array_values($temp)[2];
			$date_ = array_values($temp)[3];
			echo '<div class="form"><form class="form-signin" method="POST" id="note"><h2 class="form-signin-heading"><b>', $name_,'</b></h2><p id="note">', $note_,'</p><p id="removeNote">', $date_,'&nbsp;•&nbsp;</p><a href="removeNote.php?id=', $id_,'" id="removeNote">delete</a></form></div>';
		}

		?>

	</div>
</body>
</html>