<?php  //Start the Session
session_start();
require('connect.php');

if (isset($_POST['username']) and isset($_POST['password'])){

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = mysqli_query($connection, "INSERT INTO `users`(`username`, `password`, `background`) VALUES ('$username','$password','66B2FF')");

  $_SESSION['errorMsg'] = "Account created.";

  $url = 'index.php';
  header("Location: $url");

}
?>
<html>
<head>
  <title>Contacts</title>
  <link rel="stylesheet" href="style.php" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    #register {
      font-family: "Roboto", sans-serif;
      font-weight: 300;
      text-decoration: none;
      color: black;
    }

    #register:hover {
      color: grey;
    }

    .form-signin {
      margin-bottom: 0px !important;
    }

    p {
      margin-bottom: 0;
    }
  </style>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h1 style="color: black; font-family: 'Roboto', sans-serif; margin-top: 0; margin-bottom: 15px; font-weight: 500;">Notes</h1>
      <form class="form-signin" method="POST">
        <?php if(isset($fmsg)){ ?><div style="text-align: center;" class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
          <h2 class="form-signin-heading">Register</h2>

          <div class="input-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
          <p><a id="register" href="index.php">Already have an account?</a></p>
        </form>
      </div>
    </div>
  </body>
  </html>