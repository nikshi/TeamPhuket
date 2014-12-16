<?php

if ($queryType == 'month') {
    $month = $_GET['month'];
    $year = $_GET['year'];

    $queryType = "SELECT * FROM posts WHERE MONTH(date) = $month AND YEAR(date) = $year";
    $arr = $con->query($queryType);
    $posts = $arr->fetch_all();
} else if ($queryType == 'post') {
    $id = $_GET['id'];
    $queryType = "SELECT * FROM posts WHERE id = $id";
    $arr = $con->query($queryType);
    $posts = $arr->fetch_all();
} else if ($queryType == 'all') {
    $queryType = "SELECT * FROM posts";
    $arr = $con->query($queryType);
    $posts = $arr->fetch_all();
}

function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip = getUserIP();

foreach ($posts as $post):
    $userID = $post[4];
    $userName = $con->query("SELECT username FROM users WHERE id = $userID")->fetch_all()[0][0];
    $postID = $post[0];
    $query = "INSERT INTO views (post_id, ip) VALUES ('$postID', '$ip')";
    mysqli_query($con, $query);

    $viewQuery = $con->query("SELECT ip FROM views WHERE post_id = $postID")->fetch_all();
    $totalViews = count($viewQuery);
    $uniqueIPS = array();

    foreach ($viewQuery as $view) {
        $uniqueIPS[] = $view[0];
    }
    $uniqueViews = count(array_unique($uniqueIPS));
    ?>

    <article>
        <a href="view.php?query=post&id=<?php echo $post[0] ?>"><h1><?php echo $post[2] ?></h1></a>
        <p id="date-and-user"><?php echo $post[1] ?> | Posted by: <?php echo $userName ?> | Comments: 2</p>
        <p id="article-text"><?php echo $post[3] ?></p>
        <p id="view-data">Total views: <?php echo $totalViews ?> | Unique views: <?php echo $uniqueViews ?></p>


        <div id="comments">
            <p>Bai Ivan | 12.12.2014 22:12</p>
            <p>This is a comment from Bai Ivan</p>
            <hr />
            <p>Bai Ivan | 12.12.2014 22:12</p>
            <p>This is a comment from Bai Ivan</p>
            <hr />
            <p>Bai Ivan | 12.12.2014 22:12</p>
            <p>This is a comment from Bai Ivan</p>
            <hr />
        </div>


        <form method="get" action="#" class="commentForm">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Your E-mail">
            </div>
            <textarea class="form-control" rows="3" placeholder="Write your comment here...."></textarea>
            <input class="btn btn-default submitBtn" type="submit" value="Submit">
        </form>
    </article>

<?php endforeach ?>
