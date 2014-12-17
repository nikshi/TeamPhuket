<?php
require '../config.php';
session_start();

if (isset($_GET['comment-submit'])) {
    $name = $_GET['comment-name'];
    $comment = $_GET['comment-content'];
    $post = $_GET['post-id'];

    require '../validations.php';

    if (validateComment()) {
        $sql = "INSERT INTO comments (name, comment, post_id) VALUES ('$name', '$comment', $post)";
        $postID = mysqli_insert_id($con);

        if ($con->query($sql) === TRUE) {
            header("Location: ../view.php?query=post&id=$post");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    else {
        echo "Invalid input! Name and comment should be at least 3 characters long!"?>
        <br>
        <br>
        <a href="../view.php?query=post&id=<?php echo $post ?>">Go Back</a>
<?php

    }


}
