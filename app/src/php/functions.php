<?php

function db() {
    $mysqli = mysqli_connect("mariadb", "root", "password", "notes");

    if (!$mysqli) {
        echo "Unable to connect to database, errors:";
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $mysqli;
}

function getNotes($db, $user_id) {

    $query = "SELECT * FROM notes WHERE user_id = '$user_id' AND deleted = 0";
    $result = $db->query($query);

    $notes = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_row()){
            $notes[] = $row;
        }
    }

    return $notes;
}