<?php
$firstPost = 0;
$lastPost = 5;
$originalQuery = $queryType;
if ($queryType == 'month') {
    $month = $_GET['month'];
    $year = $_GET['year'];
    $queryType = "SELECT * FROM posts WHERE MONTH(date) = $month AND YEAR(date) = $year";
} else if ($queryType == 'post') {
    $id = $_GET['id'];
    $queryType = "SELECT * FROM posts WHERE id = $id";
} else if ($queryType == 'all') {
    $queryType = "SELECT * FROM posts ORDER BY date DESC LIMIT 0, 5";
} else if ($queryType == 'category') {
    $cat = $_GET['cat'];
    $queryType = "SELECT * FROM posts WHERE  category = $cat";
} else if ($queryType == 'older') {
    $firstPost = $_GET['first'] + 5;
    $lastPost = $_GET['last'] + 5;
    $queryType = "SELECT * FROM posts ORDER BY date DESC LIMIT $firstPost, $lastPost";
} else if ($queryType == 'newer') {
    $firstPost = $_GET['first'] - 5;
    $lastPost = $_GET['last'] - 5;
    $queryType = "SELECT * FROM posts ORDER BY date DESC LIMIT $firstPost, $lastPost";
}

$arr = $con->query($queryType);
$posts = $arr->fetch_all();
$countPosts = count($posts);
require 'ip-check.php';
$ip = getUserIP();

if (count($posts) == 0): ?>
   <h2><?php  echo "No posts match your choice!"; ?></h2>

<?php endif;
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
        <p class="date-and-user">Posted by: <?php echo $userName ?> | <?php echo $post[1] ?> | Total views: <?php echo $totalViews ?> | Unique views: <?php echo $uniqueViews ?></p>

        <div class="article-text"><?php echo $post[3] ?></div>
        <div class="comments">
            <h4>Comments (<?php echo count($comments) ?>): </h4>
            <?php
            if (count($comments) == 0): ?>
            <div class="comment-text"><p><?php echo "Be the first to leave a comment!" ?></p></div>
            <?php else:
                foreach ($comments as $comment): ?>
                    <p class="date-and-user">By: <?php echo $comment[1] ?> | Date: <?php echo $comment[2] ?></p>
                    <div class="comment-text"><p><?php echo $comment[3] ?></p></div>
                <?php endforeach;
            endif; ?>
        </div>

        <button onclick="showCommentForm(<?php echo $post[0]?>)" id="btn-<?php echo $post[0]?>">Write a comment</button>

        <form method="get" action="php/savecomment.php" class="commentForm" id="comment-form-<?php echo $post[0]?>" style="display:none;">
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

<?php

endforeach;

if($originalQuery != 'post') { ?>

<p class="page-count">Showing posts <?php echo ($firstPost + 1) ?> - <?php echo ($lastPost) ?></p>

<?php

if ($firstPost != 0):
$checkFirst = $firstPost - 5;
$checkLast = $lastPost - 5;
$queryType = "SELECT * FROM posts ORDER BY date DESC LIMIT $checkFirst, $checkLast";
$arr = $con->query($queryType);
$posts = $arr->fetch_all();

if (count($posts) != 0): ?>
    <div class="newer-posts"><a href="view.php?query=newer&first=<?php echo $firstPost?>&last=<?php echo $lastPost ?>">&lt;&lt;&lt; Show newer posts</a></div>
<?php endif;
endif;

$checkFirst = $firstPost + 5;
$checkLast = $lastPost + 5;
$queryType = "SELECT * FROM posts ORDER BY date DESC LIMIT $checkFirst, $checkLast";
$arr = $con->query($queryType);
$posts = $arr->fetch_all();

if (count($posts) != 0): ?>
    <div class="older-posts"><a href="view.php?query=older&first=<?php echo $firstPost?>&last=<?php echo $lastPost ?>">Show older posts &gt;&gt;&gt;</a></div>
<?php endif;
}
 ?>

