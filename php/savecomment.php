<?php
require '../config.php';
session_start();
if (isset($_GET['comment-submit'])) {
    $name = $_GET['comment-name'];
    $comment = $_GET['comment-content'];
    $post = $_GET['post-id'];
    $sql = "INSERT INTO comments (name, comment, post_id) VALUES ('$name', '$comment', $post)";
    mysqli_query($con, $sql);
    $postID = mysqli_insert_id($con);
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
