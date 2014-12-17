<?php
require '../config.php';
session_start();

if (isset($_GET['submit'])) {
    $title = $_GET['title'];
    $post = $_GET['editor1'];
    $userID = $_SESSION['loggedUserID'];
    $tags = $_GET['tags'];
    $category = $_GET['category'];
    $tagsArr = explode(", ", $tags);

    require '../validations.php';

    if (validatePost()) {
        $sql = "INSERT INTO posts (title, text, user_id, category) VALUES ('$title', '$post', '$userID', '$category')";
        $con->query($sql);
        $id = mysqli_insert_id($con);

        foreach($tagsArr as $t){
            $tag = "INSERT INTO tags (tags, post_id) VALUES ('$t', '$id')";
            mysqli_query($con, $tag);
        }

        if ($id != 0) {

            header("Location: ../view.php?query=post&id=$id");

        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Invalid input! Please match the required formats."; ?>
        <br>
        <a href="../writepost.php">Go Back</a>

    <?php
    }


}