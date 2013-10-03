<?php foreach( $posts_list as $post ): ?>
<div class="post-container staff_container">
    <article class="post">
        <?php if( !!$post['post']['image_url'] && substr($post['post']['image_url'], 0, 4) == 'http'): ?>
        <img src="<?php echo $post['post']['image_url']; ?>" width="100" class="post__image">
        <?php endif; ?>
        <div class="post__info">
            <p class="post__title">
                <?php if(!!$post['post']['link']): ?>
                <a target="_blank" href="<?php echo $post['post']['link']; ?>"><?php echo ucwords($post['post']['title']); ?></a>
                <?php else: ?>
                <a href="<?php echo DIRECTORY; ?>post/view/<?php echo $post['post']['id']; ?>"><?php echo ucwords($post['post']['title']); ?></a>
                <?php endif; ?>
            </p>
            <div class="post__details">

                <div class="post__details--notes">
                    <?php if(!!$post['post']['notes']): ?>
                    <p><?php echo word_limiter($post['post']['notes'], 20); ?></p>
                    <?php endif; ?>
                </div>
                <div class="post__details--extra-info">
                    <span class="post__details--author">Submitted by <a href="<?php echo DIRECTORY; ?>?<?php if($posts_type != '99'): ?>posts=<?php echo $posts_type; ?><?php endif; ?><?php echo $order_by_string; ?>&name=<?php echo $post['post']['authors_id']; ?><?php echo $archive; ?>"><?php echo $post['post']['authors_name']; ?></a> on <?php echo tidy_time_posted($post['post']['create_date']); ?></span>
                    <?php if(!!$post['post']['category']): ?>
                    <span class="post__details--tags"><label>Tags:</label> 
                        <ul>
                            <?php $c=1; foreach(explode(',', $post['post']['category']) as $tag): ?>
                            <li><a href="<?php echo DIRECTORY; ?>home?<?php if($posts_type != '99'): ?>posts=<?php echo $posts_type; ?><?php endif; ?><?php echo $order_by_string; ?>&category=<?php echo $tag; ?><?php echo $archive; ?>"><?php echo Posts::$tags[$tag]; ?><?php if($c != count(explode(',', $post['post']['category']))): ?>,<?php endif; ?>&nbsp;</a></li>
                            <?php $c++; endforeach; ?>
                        </ul>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="post__comments <?php if(count($post['post']['comments']) > 0): ?>has_comment<?php endif; ?>">
                <p><i class="icon-comment"></i> <a href="<?php echo DIRECTORY; ?>post/view/<?php echo $post['post']['id']; ?>"><?php echo count($post['post']['comments']); ?> Comments</a> | <a href="<?php echo DIRECTORY; ?>post/view/<?php echo $post['post']['id']; ?>#comment-form">Make comment</a></p>
            </div>
        </div>
        <div class="post__rate" data-rating="<?php echo $post['post']['rating']; ?>" data-post-id="<?php echo $post['post']['id']; ?>">
            <ul class="rating_system" data-id="<?php echo $post['post']['id']; ?>">
                <?php 
                    $up_rating = Ratings_model::get_ratings($post['post']['id']);
                    $down_rating = Ratings_model::get_ratings($post['post']['id'], 2);
                ?>
                <li><a href="#" class="rating_system__thumb-up js-rating"><i id="js-up-<?php echo $post['post']['id']; ?>" class="icon-thumbs-up <?php if($up_rating > 0): ?>green-thumb<?php endif; ?>" data-action="up"></i></a> <span id="js-up-amount-<?php echo $post['post']['id']; ?>"><?php echo $up_rating; ?></span></li>
                <li><a href="#" class="rating_system__thumb-down js-rating"><i id="js-down-<?php echo $post['post']['id']; ?>" class="icon-thumbs-down <?php if($down_rating > 0): ?>red-thumb<?php endif; ?>" data-action="down"></i></a> <span id="js-down-amount-<?php echo $post['post']['id']; ?>"><?php echo $down_rating; ?></span></li>
            </ul>
            <!--<div class="arrow-up js-rating" data-action="up"></div>
            <span class="post__rate--number js-rating-total" id="js-post-rating-<?php echo $post['post']['id']; ?>"><?php echo $post['post']['rating']; ?></span>
            <div class="arrow-down js-rating" data-action="down"></div>-->
        </div>
    </article>
    <?php if(!!$post['post']['approved_by'] && $archive == ""): ?>
    <div class="post-authorised post-authorised-staff">
        <p>Approved by: <?php echo Users_model::get_name($post['post']['approved_by']); ?></p>
    </div>
    <?php endif; ?>
</div>
<?php endforeach; ?>