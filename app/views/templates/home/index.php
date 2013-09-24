<div class="listing-container">
    <section class="main">
        <div class="filter-search">
            <p class="filter-search__choices">
                SHOW:
                <a href="<?php echo DIRECTORY; ?>?posts=0<?php echo $order_by_string; ?>" <?php if(!$_POST && $_GET['posts'] == 0): ?>class="active"<?php endif; ?>>Current Suggestions</a> 
                | <a href="<?php echo DIRECTORY; ?>?posts=1<?php echo $order_by_string; ?>" <?php if($_GET['posts'] == 1): ?>class="active"<?php endif; ?>>Pending</a> 
                | <a href="<?php echo DIRECTORY; ?>?posts=3<?php echo $order_by_string; ?>" <?php if($_GET['posts'] == 3): ?>class="active"<?php endif; ?>>Used</a>
                | <a href="<?php echo DIRECTORY; ?>?posts=2<?php echo $order_by_string; ?>" <?php if($_GET['posts'] == 2): ?>class="active"<?php endif; ?>>Unused</a> 
                | <a href="<?php echo DIRECTORY; ?>?posts=4<?php echo $order_by_string; ?>" <?php if($_GET['posts'] == 4): ?>class="active"<?php endif; ?>>Unused but approved</a> 
            </p>
            <a href="<?php echo DIRECTORY; ?>?posts=<?php echo $posts_type; ?>&order=<?php echo $order; ?><?php if(!!$_GET['order_by']): ?>&order_by=<?php echo $_GET['order_by']; ?><?php endif; ?>"><p class="switch_icon rating_switch"></p></a>
        </div>
        <?php if($posts_list != false): ?>
            <div class="js-infi-scroll">
            <?php if( !$to_scroll ): ?>
            <?php if( $show_decide ): ?>
            <?php include('assets/includes/management-posts-listing.php'); ?>
            <?php endif; ?>
            <?php if( !$show_decide ): ?>
            <?php include('assets/includes/staff-posts-listing.php'); ?>
            <?php endif; ?>
            <?php endif; ?>
            </div>
        <?php else: ?>
        <p>There currently isn't any posts within this section. 
        <?php if(!!$_SESSION['user']['id']): ?>
        Be the first to <a href="<?php echo DIRECTORY; ?>post/add">create one</a>.
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
    var posts_type = "<?php echo (!!$_GET['posts']?$_GET['posts']:0); ?>";
</script>