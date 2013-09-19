<section class="main">
    <div class="intro">
        <?php if( !!$post['image_url'] ): ?>
        <img src="<?php echo $post['image_url']; ?>" width="100" class="image">
        <?php endif; ?>
        <div class="description">
            <h2><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a></h2>
            <p>Posted by: <?php echo $post['authors_name']; ?></p>
            <p><?php echo date('jS F Y', strtotime($post['create_date'])); ?></p>
        </div>
    </div>
    <?php if( !!$comments && count($comments) > 0 ): ?>
    <div class="comments">
        <h3>Responses: </h3>
        <dl class="comments__list">
        <?php foreach( $comments as $comment ): ?>
            <dt class="comments__list--author" id="comment-<?php echo $comment['id']; ?>"><strong><?php echo $comment['authors_name']; ?></strong> responded <?php echo tidy_time_posted($comment['create_date']); ?> ago:</dt>
            <dd class="comments__list--comment"><?php echo $comment['body']; ?></dd>
        <?php endforeach; ?>
        </dl>
    </div>
    <?php endif; ?>

    <?php include("assets/includes/comment-form.php"); ?>
</section>

<?php include "assets/includes/aside.php"; ?>