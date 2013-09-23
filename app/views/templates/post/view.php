<section class="main">
    <a href="#"><span class="back-btn js-back">Back to posts</span></a>
    
    <div class="post-entry">

        <?php if( !!$post['image_url'] ): ?>
        <img src="<?php echo $post['image_url']; ?>" width="100" class="image">
        <?php endif; ?>
        <div class="description">
            <h2><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a></h2>
            <?php if(!!$post['notes']): ?>
            <p><?php echo $post['notes']; ?></p>
            <?php endif; ?>
            <p>Submitted by: <a href="<?php echo DIRECTORY; ?>?name=<?php echo $post['authors_id']; ?>"><?php echo $post['authors_name']; ?></a> on <?php echo date('jS F Y', strtotime($post['create_date'])); ?></p>
        </div>
    </div>
    <?php if( !!$comments && count($comments) > 0 ): ?>
    <h3><?php echo count($comments); ?> Response(s):</h3>
    <div class="comments">
        
        <?php foreach( $comments as $comment ): ?>
        <div class="comments__list">
            <p class="comments__list--comment"><?php echo $comment['body']; ?></p>
            <p class="comments__list--author" id="comment-<?php echo $comment['id']; ?>">By <a href="<?php echo DIRECTORY; ?>?name=<?php echo $comment['authors_id']; ?>"><?php echo $comment['authors_name']; ?></a> at <?php echo tidy_time_posted($comment['create_date']); ?></p>
        </div>
        <?php endforeach; ?>
        
    </div>
    <?php endif; ?>

    <?php include("assets/includes/comment-form.php"); ?>
</section>

<?php include "assets/includes/aside.php"; ?>