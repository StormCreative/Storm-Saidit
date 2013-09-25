<section class="main">
    <div class="post-entry">
        <?php if( !!$post['image_url'] && substr($post['image_url'], 0, 4) == 'http'): ?>
        <img src="<?php echo $post['image_url']; ?>" width="100" class="image">
        <?php endif; ?>
        <div class="description">
            <h2><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a></h2>
            <?php if(!!$post['notes']): ?>
            <p><?php echo $post['notes']; ?></p>
            <?php endif; ?>
            <p>Submitted by: <a href="<?php echo DIRECTORY; ?>?name=<?php echo $post['authors_id']; ?>"><?php echo $post['authors_name']; ?></a> on <?php echo date('jS F Y', strtotime($post['create_date'])); ?></p>
        </div>
        <div class="post-entry-rating">
            <ul class="rating_system" data-id="<?php echo $post['id']; ?>">
                <?php 
                    $up_rating = Ratings_model::get_ratings($post['id']);
                    $down_rating = Ratings_model::get_ratings($post['id'], 2);
                ?>
                <li><a href="#" class="rating_system__thumb-up js-rating"><i id="js-up-<?php echo $post['id']; ?>" class="icon-thumbs-up <?php if($up_rating > 0): ?>green-thumb<?php endif; ?>" data-action="up"></i></a> <span id="js-up-amount-<?php echo $post['id']; ?>"><?php echo $up_rating; ?></span></li>
                <li><a href="#" class="rating_system__thumb-down js-rating"><i id="js-down-<?php echo $post['id']; ?>" class="icon-thumbs-down <?php if($down_rating > 0): ?>red-thumb<?php endif; ?>" data-action="down"></i></a> <span id="js-down-amount-<?php echo $post['id']; ?>"><?php echo $down_rating; ?></span></li>
            </ul>
        </div>
    </div>
    <?php if( !!$comments && count($comments) > 0 ): ?>
    <h3><i class="icon-comment"></i> <?php echo count($comments); ?> Response(s):</h3>
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