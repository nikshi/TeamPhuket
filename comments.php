<div id="comments" class="comments">
    <h4>Comments (<?php echo count($comments) ?>): </h4>
    <?php
    require 'config.php';
    if (isset($_SESSION['loggedUser'])):
    $userID = $_SESSION['loggedUserID'];
    $query = "SELECT * FROM `users` WHERE id = '$userID'";
    $arrUser = $con->query($query);

    while ($row = mysqli_fetch_assoc($arrUser)){
        $type = $row['type_account'];
    }


    if (count($comments) == 0): ?>
        <div class="comment-text"><p><?php echo "Be the first to leave a comment!" ?></p></div>
    <?php else:
        foreach ($comments as $comment): ?>
            <div id="comment<?php echo $comment[0] ?>"">
                <p class="date-and-user">By: <?php echo $comment[1] ?> | Date: <span class="post-date"><?php echo $comment[2] ?></span></p>
                <div class="comment-text"><p><?php echo $comment[3] ?></p></div>
                <?php
                if ($type == 'admin'):?>
                    <button class="del-comment-btn" onclick="removeComments(<?php echo $comment[0]?>)" id="btn-<?php echo $comment[0]?>">Delete this comment</button>
                <?php endif
                ?>
            </div>
        <?php endforeach;
    endif;
    endif
    ?>

</div>