<?php

include_once 'functions.php';

?>


<div id="is-user-registered">
    <form id="to-register-or-to-login" method="post">
        <input type="submit" name="registered" value="Already registered?">
        <input type="submit" name="not_registered" value="Need to register?">
    </form>
</div>

<?php

if( isset( $_POST ) ){

    if( isset( $_POST['registered']) ){
        ?>
        <form id="login-form" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
    }

    if( isset( $_POST['not_registered']) ){
        ?>
        <form id="register-form" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="firstname" placeholder="First name" required>
            <input type="text" name="lastname" placeholder="Last name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
            <input type="submit" name="register" value="Register">
        </form>
        <?php
    }

    if( isset( $_POST['register']) ){

        if( $_POST['password'] !== $_POST['confirmpassword'] ) {
            echo 'Passwords do not match.';
            exit;
        }

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];

        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insert_query = "
            INSERT INTO users (id, username, firstname, lastname, password)
            VALUES (null, '$username', '$firstname', '$lastname', '$hash');
            ";

        $db = db();

        $result = $db->query($insert_query);

    }

    if( isset( $_POST['login']) ){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = db();

        $select_query = $db->query("SELECT password FROM users WHERE username = '$username'");

        if($select_query->num_rows > 0){
            $saved_hash = $select_query->fetch_row()[0];
        }else{
            exit;
        }

        if( password_verify($password, $saved_hash) ) {
            setcookie('notes_user_is_logged_in', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
            header("Refresh:0");
        }
        else {
            echo 'invalid password';
        }
    }


}
?>