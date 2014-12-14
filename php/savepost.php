<?php
require '../config.php';
if (isset($_GET['submit'])) {
    $title = $_GET['title'];
    $post = $_GET['editor1'];


    $sql = "INSERT INTO posts (title, text) VALUES ('$title', '$post')";
//    $mysqli->query($sql);

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}