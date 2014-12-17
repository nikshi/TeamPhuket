<div class="post-lists">
    <h2>Last posts</h2>
    <ul class="nav nav-tabs">
        <?php
        require 'config.php';
        $lastPostsQuery = "SELECT * FROM posts ORDER BY date DESC LIMIT 0, 5";

        $arr = $con->query($lastPostsQuery);

        while($row = mysqli_fetch_assoc($arr)){
            $title = $row['title'];
            $date = $row['date'];
            $id = $row['id'];
            $cat = $row['category'];
            $category = $con->query("SELECT name FROM categories WHERE id = $cat")->fetch_all()[0][0];

            ?>
            <li><a href="view.php?query=post&id=<?php echo $id ?>"><?php echo $title?><br> <?php echo $date?> <br>in <?php echo $category?></a></li>
        <?php } ?>
    </ul>
</div>