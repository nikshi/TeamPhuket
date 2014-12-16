<?php
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Phuket Blog</title>
    <link rel="stylesheet" href="css/resetter.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="JS/functions.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<header>
    <?php
    if (isset($_SESSION['loggedUser'])):
        ?>
        <div class="login"><span>Hello, <?php echo $_SESSION['loggedUserName'] ?></span>
            <a href="php/logout.php">
                <button type="button" class="btn btn-default btn-sm ">Logout</button>
            </a>
            <a href="writepost.php">
                <button type="button" class="btn btn-default btn-sm ">Write post</button>
            </a>
        </div>

    <?php
    else :
        ?>
        <form method="post" action="php/login.php">
            <div class="login">
                <div class="input-group input-group-sm loginFields">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" name="user" placeholder="Username">
                </div>
                <div class="input-group input-group-sm loginFields">
                    <span class="input-group-addon">@</span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-default btn-sm ">Login</button>
                <a href="register.php">
                    <button type="button" class="btn btn-default btn-sm ">Register</button>
                </a>
            </div>
        </form>
    <?php endif; ?>
    <nav><p>CATEGORIES:</p>
        <div class="menu">
            <ul>
                <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($con, $sql);
                while($categories = mysqli_fetch_row($result)){
                    echo "<li><a href=\"view.php?query=category&cat=$categories[0]\">$categories[1]</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <p class="logo"><a href="index.php">Phunket's Team Blog</a></p>
</header>