<?php
require 'header.php';;
?>
<main>
    <div id="main-content">
        <?php
        include 'write.php';
        ?>
    </div>
    <aside id="right-write-post">
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

