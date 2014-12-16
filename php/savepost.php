<?php
require '../config.php';
session_start();

if (isset($_GET['submit'])) {
    $title = $_GET['title'];
    $post = $_GET['editor1'];
    $userID = $_SESSION['loggedUserID'];
    $tags = $_GET['tags'];
    $category = $_GET['cat'];
    $tagsArr = explode(", ", $tags);

    $sql = "INSERT INTO posts (title, text, user_id, category) VALUES ('$title', '$post', '$userID', '$category')";
    mysqli_query($con, $sql);
    $postID = mysqli_insert_id($con);

    foreach($tagsArr as $t){
    $tag = "INSERT INTO tags (tags, post_id) VALUES ('$t', '$postID')";
        mysqli_query($con, $tag);
    }

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}