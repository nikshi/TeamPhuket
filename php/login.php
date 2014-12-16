<?php
require ('../config.php');
session_start();

if (isset($_POST['submit'])) {
    $user = htmlentities($_POST['user']);
    $pass = htmlentities($_POST['password']);
    $pass = hash('sha256', $pass);

    $query = "SELECT id, name FROM users WHERE (username = '$user' AND password = '$pass')";
    $result = mysqli_query($con, $query);

    if ($result -> num_rows > 0) {
        $loggedUser = $result -> fetch_assoc();
        $_SESSION['loggedUser'] = true;
        $_SESSION['loggedUserID'] =$loggedUser['id'];
        $_SESSION['loggedUserName'] =$loggedUser['name'];
        header('Location: ../index.php');
        echo 'Logged in';
    } else {
        echo 'failed';
    }
}