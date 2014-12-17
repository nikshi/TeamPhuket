<?php
require 'config.php';

$searchedWord = $_GET['search'];

$searchQuery = "SELECT * FROM `tags` WHERE tags = '$searchedWord'";
$arr = $con->query($searchQuery);

if ($con->query($searchQuery)) {
    $count = 0;
    while($rows = mysqli_fetch_assoc($arr)) {
        $postID = $rows['post_id'];
        $postSql = "SELECT * FROM `posts` WHERE id = '$postID'";
        $postArr = $con -> query($postSql);

        while ($post = mysqli_fetch_assoc($postArr)): ?>
            <article>
                <ul>
                    <li><a href="view.php?query=post&id=<?php echo $postID ?>"><h1><?php echo $post['title'] ?></h1></a>
                        <div class="article-text"><?php echo $post['text'] ?></div>
                        <div class=""><a href="view.php?query=post&id=<?php echo $postID ?>"><p>See details...</p>
                    </li>
                <ul>
            </article>
        <?php
        endwhile;
        $count++;
    }
    if ($count == 0){ ?>
        <p> "Sorry, no tags match your choice"; </p>
    <?php }
}else {
    echo "Error: " . $searchQuery . "<br>" . $con->error;
}
?>