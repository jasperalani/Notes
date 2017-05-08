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

	$notes = array();

	$result = mysqli_query($connection, "SELECT `name`, `note`, `ID` FROM `notes` WHERE `user_ID` = '$user_id'");
	$notesAmount = mysqli_num_rows($result);

	for($x = 0; $x < $notesAmount; $x++){
		$data = mysqli_fetch_assoc($result);

		//debug_to_console(array_values($data)[0]);
		//debug_to_console(array_values($data)[1]);

		$temp = array(array_values($data)[0], array_values($data)[1], array_values($data)[2]);
		array_push($notes, $temp);
	}
	//debug_to_console(array_values($notes)[0]);
}
?>
<html>
<head>
	<title>Notes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
	<div class="dropdown">
		<img src="gear.png" class="dropbtn" style="width: 25px; float: left">
		<div class="dropdown-content">
			<a id="logout" href="logout.php">Logout</a>
			<?php echo '<a id="logout" href="delAcc.php?id=', $user_id,'">Delete Account</a>'; ?>
		</div>
	</div>
	<div class="title">
		<h1>Notes</h1>
		<a id="new" href="new.php">new note</a>
		<?php
		if(sizeof($notes) == 0){
			echo '<p style="margin-top: 100px; color: white;">You have no notes.</p>';
		}
		for($x = 0; $x < sizeof($notes); $x++){
			$temp = array_values($notes)[$x];
			$name_ = array_values($temp)[0];
			$note_ = array_values($temp)[1];
			$id_ = array_values($temp)[2];
			echo '<div class="form"><form class="form-signin" method="POST" id="note"><h2 class="form-signin-heading">', $name_,'</h2><p>', $note_,'</p><a href="removeNote.php?id=', $id_,'" id="removeNote">delete</a></form></div>';
		}
		?>

	</div>
</body>
</html>