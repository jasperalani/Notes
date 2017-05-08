<?php  //Start the Session
session_start();
require('connect.php');
if(isset($_SESSION['authenticated'])){
  if($_SESSION['authenticated'] == true){
    $url = 'notes.php';
    header( "Location: $url" );
  }
}else{
//3. If the form is submitted or not.
//3.1 If the form is submitted
  if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
      $_SESSION['username'] = $username;
      $_SESSION['authenticated'] = true;
    }else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
      $fmsg = "Invalid Login Credentials.";
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
    <link rel="stylesheet" href="style.css" >
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
        margin-bottom: 0 !important;
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
        <h2 class="form-signin-heading">Login</h2>
        <div class="input-group">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p><a id="register" href="register.php">Register</a></p>
      </form>
    </div>
  </div>
</body>

</html>
<?php 
} ?>