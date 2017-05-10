<?php

?>
<html>
<head>
	<title>Sticky Notes</title>
	<link rel="stylesheet" type="text/css" href="style.php">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<script type="text/javascript" src="jscolor.js"></script>
	<style type="text/css">
		#backCol {
			position: relative;
			float: left;
			margin-top: 0;
			margin-bottom: 3px;
		}

		#back {
			font-weight: 300;
			text-decoration: none;
			color: white;
		}

		#back:hover {
			color: lightgray;
		}
	</style>
</head>
<body>
	<a id="back" href="notes.php">Back</a>
	<div class="login-page">
		<div class="form">
			<form class="form-signin" method="POST" action="save.php">
				<h2 class="form-signin-heading" style="font-size: 20px;">Account Settings</h2>
				<input type="text" name="username_change" class="form-control" placeholder="Change username">
				<input type="password" name="password_change" class="form-control" placeholder="Change password">
				<input type="text" name="del_acc" class="form-control" placeholder="Delete account? Type yes">
				<h2 class="form-signin-heading" style="font-size: 20px;">Website Settings</h2>
				<p id="backCol">Background colour</p>
				<input class="jscolor" id="jscolor" name="jscolor" value="66B2FF">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
			</form>
		</div>
	</div>
</body>
</html>