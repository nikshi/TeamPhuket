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