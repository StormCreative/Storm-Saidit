<div class="listing-container">
    <section class="main">
        <div class="filter-search">
            <p class="filter-search__choices">
                SHOW:
                <a href="<?php echo DIRECTORY; ?>" <?php if(!$_GET && !$_POST): ?>class="active"<?php endif; ?>>Recent Suggestions</a> 
                | <a href="<?php echo DIRECTORY; ?>?posts=1" <?php if($_GET['posts'] == 1): ?>class="active"<?php endif; ?>>Pending</a> 
                | <a href="<?php echo DIRECTORY; ?>?posts=2" <?php if($_GET['posts'] == 2): ?>class="active"<?php endif; ?>>Unused</a> 
                | <a href="<?php echo DIRECTORY; ?>?posts=3" <?php if($_GET['posts'] == 3): ?>class="active"<?php endif; ?>>Previously Used</a>
                | <a href="<?php echo DIRECTORY; ?>?posts=4" <?php if($_GET['posts'] == 4): ?>class="active"<?php endif; ?>>Approved and Unused</a> 
            </p>
            <p class="switch_icon rating_switch"></p>
        </div>
        <?php if($posts_list != false): ?>
            <div class="js-infi-scroll">
            <?php if( !$to_scroll ): ?>
            <?php foreach( $posts_list as $post ): ?>
                <article class="post">
                    <?php if( !!$post['image_url'] && substr($post['image_url'], 0, 4) == 'http'): ?>
                    <img src="<?php echo $post['image_url']; ?>" width="100" class="post__image">
                    <?php endif; ?>
                    <div class="post__info">
                        <p class="post__title"><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo ucwords($post['title']); ?></a></p>
                        <div class="post__details">
                            <?php if(!!$post['notes']): ?>
                            <p class="post__details--notes"><?php echo word_limiter($post['notes'], 40); ?></p>
                            <?php endif; ?>
                            <div class="post__details--extra-info">
                                <span class="post__details--author">Submitted by <a href="<?php echo DIRECTORY; ?>?posts=<?php echo $posts_type; ?>&name=<?php echo $post['authors_id']; ?>"><?php echo $post['authors_name']; ?></a> on <?php echo tidy_time_posted($post['create_date']); ?></span>
                                <?php if(!!$post['category']): ?>
                                <span class="post__details--tags">Tags: 
                                <?php $c=1; foreach(explode(',', $post['category']) as $tag): ?>
                                <a href="<?php echo DIRECTORY; ?>home?posts=<?php echo $posts_type; ?>&category=<?php echo $tag; ?>"><?php echo Posts::$tags[$tag]; ?><?php if($c != count(explode(',', $post['category']))): ?>,<?php endif; ?>&nbsp;</a>
                                <?php $c++; endforeach; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="post__comments">
                            <p><i class="icon-comment"></i> <a href="<?php echo DIRECTORY; ?>post/view/<?php echo $post['id']; ?>"><?php echo count($post['comments']); ?> Comments</a> | <a href="<?php echo DIRECTORY; ?>comments/add/<?php echo $post['id']; ?>">Make comment</a></p>
                        </div>
                    </div>
                    <div class="post__rate" data-rating="<?php echo $post['rating']; ?>" data-post-id="<?php echo $post['id']; ?>">
                        <ul class="rating_system" data-id="<?php echo $post['id']; ?>">
                            <?php 
                                $up_rating = Ratings_model::get_ratings($post['id']);
                                $down_rating = Ratings_model::get_ratings($post['id'], 2);
                            ?>
                            <li><a href="#" class="rating_system__thumb-up js-rating"><i class="icon-thumbs-up <?php if($up_rating > 0): ?>green-thumb<?php endif; ?>" data-action="up"></i></a> <span id="js-up-amount-<?php echo $post['id']; ?>"><?php echo $up_rating; ?></span></li>
                            <li><a href="#" class="rating_system__thumb-down js-rating"><i class="icon-thumbs-down <?php if($down_rating > 0): ?>red-thumb<?php endif; ?>" data-action="down"></i></a> <span id="js-down-amount-<?php echo $post['id']; ?>"><?php echo $down_rating; ?></span></li>
                        </ul>
                        <!--<div class="arrow-up js-rating" data-action="up"></div>
                        <span class="post__rate--number js-rating-total" id="js-post-rating-<?php echo $post['id']; ?>"><?php echo $post['rating']; ?></span>
                        <div class="arrow-down js-rating" data-action="down"></div>-->
                    </div>
                </article>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        <?php else: ?>
        <p>Oh, there doesn't seem to be any posts under that criteria. 
        <?php if(!!$_SESSION['user']['id']): ?>
        Why not <a href="<?php echo DIRECTORY; ?>post/add">create one?</a>
        <?php endif; ?>
        <?php endif; ?>
    </section>
<?php include "assets/includes/aside.php"; ?>
</div>
<script> 
    <?php if(!!$posts_list): ?>
    var total_items = <?php echo count($posts_list); ?>;
    <?php endif; ?>
    <?php if($to_scroll): ?>
    var scroll = <?php echo $to_scroll; ?>;
    <?php endif; ?>
</script>