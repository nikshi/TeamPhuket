<?php
require 'header.php';;
?>
<main>
    <div id="main-content">
        <?php
        $month = $_GET['month'];
        $year = $_GET['year'];

        $monthQuery = "SELECT * FROM posts WHERE MONTH(date) = $month AND YEAR(date) = $year";
        $arr = $con->query($monthQuery);
        $posts = $arr->fetch_all();

        foreach ($posts as $post): ?>
            <article>
                <h1><?php echo $post[2] ?></h1>
                <p id="date-and-user"><?php echo $post[1] ?> | Posted by: Admin | Hints: 32 | Comments: 2</p>
                <p id="article-text"><?php echo $post[3] ?></p>
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
    </div>
    <aside>
        <?php
        include 'lastposts.php';
        include 'months.php';
        include 'tags.php';
        ?>

    </aside>
</main>
<?php
include 'footer.php';
?>

