<div class="main_container">
<section class="main">
    <div class="post-entry">
        <?php if( !!$post['image_url'] && substr($post['image_url'], 0, 4) == 'http'): ?>
        <img src="<?php echo $post['image_url']; ?>" width="100" class="image">
        <?php endif; ?>
        <div class="description">
            <p class="description__title"><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a></p>
            <?php if(!!$post['notes']): ?>
            <p><?php echo $post['notes']; ?></p>
            <?php endif; ?>
            <p class="submitted-by">Submitted by: <a href="<?php echo DIRECTORY; ?>?name=<?php echo $post['authors_id']; ?>&archive=1"><?php echo $post['authors_name']; ?></a> on <?php echo date('jS F Y', strtotime($post['create_date'])); ?></p>

            <?php if(!!$post['category']): ?>
            <span class="post__details--tags">Tags: 
            <?php $c=1; foreach(explode(',', $post['category']) as $tag): ?>
            <a href="<?php echo DIRECTORY; ?>home?archive=1&category=<?php echo $tag; ?>"><?php echo Posts::$tags[$tag]; ?><?php if($c != count(explode(',', $post['category']))): ?>,<?php endif; ?>&nbsp;</a>
            <?php $c++; endforeach; ?></span>
            <?php endif; ?>
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
    <?php if(count($post['image']) > 0): ?>
    <div class="post-images">
        <?php foreach($post['image'] as $image): ?>
        <div class="post-images__image">
            <img src="<?php echo DIRECTORY; ?>assets/uploads/images/270/<?php echo $image['imgname']; ?>" width="260">
            <p class="post-images__image--download"> <a href="<?php echo DIRECTORY; ?>post/image/<?php echo $image['imgname']; ?>"><i class="icon-cloud-download"></i> Download Image</a></p>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if( count( $post[ 'uploads' ] ) > 0 ) : ?>
        <?php foreach( $post[ 'uploads' ] as $upload ) : ?>
        <p>
            <a href="<?php echo DIRECTORY; ?>assets/uploads/documents/<?php echo $post[ 'name' ]; ?>"><?php echo $post[ 'title' ]; ?></a>
        </p>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if( !!$comments && count($comments) > 0 ): ?>
    <h3><i class="icon-comment"></i> <?php echo count($comments); ?> Response<?php if(count($comments) > 1): ?>s<?php endif; ?>:</h3>
    <div class="comments">
        
        <?php foreach( $comments as $comment ): ?>
        <div class="comments__list">
            <p class="comments__list--comment"><?php echo $comment['body']; ?></p>
            <p class="comments__list--author" id="comment-<?php echo $comment['id']; ?>">By <a href="<?php echo DIRECTORY; ?>?name=<?php echo $comment['authors_id']; ?>&archive=1"><?php echo $comment['authors_name']; ?></a> on <?php echo tidy_time_posted($comment['create_date']); ?></p>
        </div>
        <?php endforeach; ?>
        
    </div>
    <?php endif; ?>

    <?php include("assets/includes/comment-form.php"); ?>
</section>

<?php include "assets/includes/aside.php"; ?>
</div>