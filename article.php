<?php

if ($queryType == 'month') {
    $month = $_GET['month'];
    $year = $_GET['year'];

    $queryType = "SELECT * FROM posts WHERE MONTH(date) = $month AND YEAR(date) = $year";
} else if ($queryType == 'post') {
    $id = $_GET['id'];
    $queryType = "SELECT * FROM posts WHERE id = $id";
} else if ($queryType == 'all') {
    $queryType = "SELECT * FROM posts";
} else if ($queryType == 'category') {
    $cat = $_GET['cat'];
    $queryType = "SELECT * FROM posts WHERE  category = $cat";
}

$arr = $con->query($queryType);
$posts = $arr->fetch_all();

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

    $commentQuery = "SELECT * FROM comments WHERE post_id = $post[0]";
    $comments = $con->query($commentQuery)->fetch_all();

    ?>

    <article>
        <a href="view.php?query=post&id=<?php echo $post[0] ?>"><h1><?php echo $post[2] ?></h1></a>
        <p class="date-and-user">Posted by: <?php echo $userName ?> | <?php echo $post[1] ?> | Comments: <?php echo count($comments) ?> | Total views: <?php echo $totalViews ?> | Unique views: <?php echo $uniqueViews ?></p>

        <div class="article-text"><?php echo $post[3] ?></div>
        <div class="comments">
            <h4>Comments:</h4>
            <?php
            foreach ($comments as $comment):
                ?>
                <p class="date-and-user">By: <?php echo $comment[1] ?> | Date: <?php echo $comment[2] ?></p>
                <div class="comment-text"><p><?php echo $comment[3] ?></p></div>
            <?php endforeach ?>
        </div>

        <form method="get" action="php/savecomment.php" class="commentForm">
            <h4>Write a comment:</h4>
            <input type="hidden" name="post-id" value="<?php echo $post[0] ?>">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                <input type="text" class="form-control" placeholder="Your Name" name="comment-name">
            </div>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Your E-mail" name="comment-email">
            </div>
            <textarea class="form-control" name="comment-content" rows="3" placeholder="Write your comment here...."></textarea>
            <input class="btn btn-default submitBtn" type="submit" value="Submit" name="comment-submit">
        </form>
    </article>

<?php endforeach ?>
