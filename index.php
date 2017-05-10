<?php
require('connect.php');
session_start();

if(isset($_SESSION['authenticated'])){
  if($_SESSION['authenticated'] == true){
    header( "Location: /notes.php" );
  }
}else{

  if(isset($_SESSION['errorMsg'])){
    unset($_SESSION['errorMsg']);
  }

  if (isset($_POST['username']) and isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1){
      $_SESSION['username'] = $username;
      $_SESSION['authenticated'] = true;
    }else{
      $_SESSION['errorMsg'] = "Invalid Login Credentials.";
    }
  }
  if (isset($_SESSION['username'])){
    $_SESSION['authenticated'] = true;
    $url = 'getID.php';
    header( "Location: $url" );
  }
  ?>
  <html>
  <head>
    <title>Notes</title>
    <link rel="stylesheet" href="style.php" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="login-page">
    <div class="form">
    <?php if(isset($_SESSION['errorMsg'])){ echo "<p style='font-family: sans-serif'>", $_SESSION['errorMsg'],"</p>"; } ?>
    <h1 style="color: black; font-family: 'Roboto', sans-serif; margin-top: 0; margin-bottom: 15px; font-weight: 500;">Notes</h1>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Login</h2>
        <div class="input-group">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p><a id="register" href="register.php">Don't have an account?</a></p>
      </form>
    </div>
  </div>
</body>
</html>
<?php 
} ?>