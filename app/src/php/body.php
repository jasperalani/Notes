<?php

include_once 'functions.php';

global $logged_in, $user_id;

if( ! isset($_COOKIE['notes_user_is_logged_in']) ) {
    // Not logged in
    include_once 'validate.php';
}else{
    $logged_in = true;

    $username = $_COOKIE['notes_user_is_logged_in'];

    $db = db();
    $user_id_query = $db->query("SELECT id FROM users WHERE username = '$username'");

    if($user_id_query->num_rows > 0){
        $user_id = $user_id_query->fetch_row()[0];
    }else{
        exit;
    }

}

if( isset($_POST['logout']) ){
    // Logout user
    setcookie('notes_user_is_logged_in', '', time() - 3600, "/"); // 86400 = 1 day
}

if( isset($_POST['want-to-add-note']) ){
    ?>
    <form id="add-note-form" method="post">
        <textarea name="text" placeholder="Text" required></textarea>
        <input type="submit" name="add-note" value="Add">
    </form>
    <?php
    exit;
}

if( isset($_POST['add-note']) ){

    $note = $_POST['text'];
    $username = $_COOKIE['notes_user_is_logged_in'];

    $db = db();
    $user_id_query = $db->query("SELECT id FROM users WHERE username = '$username'");

    if($user_id_query->num_rows > 0){
        $user_id = $user_id_query->fetch_row()[0];
    }else{
        exit;
    }

    $insert_query = "
            INSERT INTO notes (id, user_id, date, text)
            VALUES (null, '$user_id', CURRENT_TIMESTAMP, '$note');
            ";

    $result = $db->query($insert_query);

    header("Refresh:0");
    exit;
}

if( isset($_POST['remove-note']) ){
    $note_id = $_POST['remove-note-id'];
    $db = db();
    $check_query = $db->query("SELECT * FROM notes WHERE id = $note_id AND deleted = 0");

    if($check_query->num_rows > 0){
        $delete_query = $db->query("UPDATE notes SET deleted = 1 WHERE id = $note_id");
    }else{
        // Note doesnt exist
    }
}

$db = db();

$notes = getNotes($db, $user_id);

?>

<body>

    <?php if($logged_in){ ?>
        <form id="logout-form" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>

        <form id="want-to-add-note-form" method="post">
            <input type="submit" name="want-to-add-note" value="Add note">
        </form>


        <?php

        if(!empty($notes)){
            echo "<ul id='notes-list'>";
        }

        foreach ( $notes as $note_key => $note ){
            $note_id = $note[0];
            echo "<div class='note'>";
            echo "<p class='note-text'>";
            echo $note[3];
            echo "</p>";
            ?>
            <form id="remove-note" method="post">
                <input type="text" style="display: none;" name="remove-note-id" value="<?= $note_id ?>">
                <input type="submit" name="remove-note" value="&times;">
            </form>
            <?php
//            echo "<span class='note-delete'>&times;</span>";
            echo "</div>";
        }

        if(!empty($notes)){
            echo "</ul>";
        }

        ?>

    <?php } ?>

    <style>

        #notes-list .note {
            width: 100px;
            height: 100px;
            background: grey;
            margin: 10px;
        }
        #notes-list .note p.note-text, #notes-list .note span.note-delete {
            padding: 10px;
        }
        #notes-list .note span.note-delete {
            font-size: 30px;
            color: #8b0000;
        }
        #notes-list .note span.note-delete:hover {
            color: red;
        }

    </style>

</body>