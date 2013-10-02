<div class="main_container">
    <div class="listing-container">
        <section class="main">
            <div class="filter-search">
                <p class="filter-search__choices">
                    SHOW:
                    <a href="<?php echo DIRECTORY; ?>?posts=0" <?php if(!$_POST && $_GET['posts'] == 0): ?>class="active"<?php endif; ?>>Current Suggestions</a> 
                    | <a href="<?php echo DIRECTORY; ?>?posts=1" <?php if($_GET['posts'] == 1): ?>class="active"<?php endif; ?>>Pending</a> 
                    | <a href="<?php echo DIRECTORY; ?>?posts=3" <?php if($_GET['posts'] == 3): ?>class="active"<?php endif; ?>>Used</a>
                    | <a href="<?php echo DIRECTORY; ?>?posts=2" <?php if($_GET['posts'] == 2): ?>class="active"<?php endif; ?>>Unused</a> 
                    | <a href="<?php echo DIRECTORY; ?>?posts=4" <?php if($_GET['posts'] == 4): ?>class="active"<?php endif; ?>>Unused but approved</a> 
                </p>
                <?php if($posts_list != false): ?>
                
                <!-- if management then use this one -->
                <a href="<?php echo DIRECTORY; ?><?php echo $current_page; ?>?posts=<?php echo $posts_type; ?>&order=<?php echo $order; ?><?php if(!!$_GET['order_by']): ?>&order_by=<?php echo $_GET['order_by']; ?><?php endif; ?><?php if(!!$posts_category): ?>&posts_category=<?php echo $posts_category; ?><?php endif; ?><?php if(!!$_GET['posts_category']): ?>&posts_category=<?php echo $_GET['posts_category']; ?><?php endif; ?>"><p class="switch_icon rating_switch management-switch"></p></a>
                <?php endif; ?>
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
            <div class="pagination">
                <ul>
                    <li>
                        <?php if(!!$back_button): ?>
                        <a href="<?php echo DIRECTORY; ?><?php echo $back_button; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>" class="pagination__item pagination__item--previous">Previous</a>
                        <?php endif; ?> 
                    </li>
                    <li class="pagination__info"><span>Page <?php echo $page_no; ?> of <?php echo $total_pages; ?></span></li>
                    <?php if(!!$next_button): ?>
                    <li class="pagination__right"><a href="<?php echo DIRECTORY; ?><?php echo $next_button; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>" class="pagination__item pagination__item--next">Next</a></li>
                    <?php endif; ?>
                </ul>
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