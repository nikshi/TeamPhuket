<?php
require 'header.php';;
?>
<main>
    <div id="main-content">
        <?php
        include 'signUp.php';
        ?>
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

