<section class="main">
    <h3>Post Comment:</h3>
    <p><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a></p>

    <?php include("assets/includes/comment-form.php"); ?>
</section>

<?php include "assets/includes/aside.php"; ?>