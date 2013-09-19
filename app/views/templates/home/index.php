<?php include('assets/includes/search-form.php'); ?>
<section class="main">
<p>
    <a href="<?php echo DIRECTORY; ?>" <?php if(!$_GET && !$_POST): ?>class="active"<?php endif; ?>>Recent Suggestions</a> 
    | <a href="<?php echo DIRECTORY; ?>?posts=1" <?php if(isset($_GET['today'])): ?>class="active"<?php endif; ?>>Pending</a> 
    | <a href="<?php echo DIRECTORY; ?>?posts=2" <?php if(isset($_GET['today'])): ?>class="active"<?php endif; ?>>Unused</a> 
    | <a href="<?php echo DIRECTORY; ?>?posts=3" <?php if(isset($_GET['all'])): ?>class="active"<?php endif; ?>>Previously Used</a>
    | <a href="<?php echo DIRECTORY; ?>?posts=4" <?php if(isset($_GET['today'])): ?>class="active"<?php endif; ?>>Approved and Unused</a> 
</p>
<?php if($posts_list != false): ?>
    <div class="js-infi-scroll">
    <?php if( !$to_scroll ): ?>
    <?php foreach( $posts_list as $post ): ?>
        <article class="post">
            <?php if( !!$post['image_url'] && substr($post['image_url'], 0, 4) == 'http'): ?>
            <img src="<?php echo $post['image_url']; ?>" width="100" class="post__image">
            <?php endif; ?>
            <div class="post__info">
                <p class="post__title"><a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a></p>
                <p class="post__details"><span class="post__details--author">Submitted <?php echo tidy_time_posted($post['create_date']); ?> ago by <a href=""><?php echo $post['authors_name']; ?></a></span></p>
                <div class="post__comments">
                    <p><a href="<?php echo DIRECTORY; ?>post/view/<?php echo $post['id']; ?>"><?php echo count($post['comments']); ?> Comments</a> | <a href="<?php echo DIRECTORY; ?>comments/add/<?php echo $post['id']; ?>">Make comment</a></p>
                </div>
            </div>
            <div class="post__rate" data-rating="<?php echo $post['rating']; ?>" data-post-id="<?php echo $post['id']; ?>">
                <div class="arrow-up js-rating" data-action="up"></div>
                <span class="post__rate--number js-rating-total" id="js-post-rating-<?php echo $post['id']; ?>"><?php echo $post['rating']; ?></span>
                <div class="arrow-down js-rating" data-action="down"></div>
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
<script> 
    var total_items = <?php echo count($posts_list); ?>;
    var scroll = <?php echo $to_scroll; ?>;
</script>