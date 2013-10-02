<!doctype html>
<!--[if IE 8]><html class="ie8" dir="ltr" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" dir="ltr" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html dir="ltr" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Storm Creative" />

        <title>Saidit. - A social tool.</title>
        <meta name="keywords" content="<?php echo $meta_keywords; ?>">
        <meta name="description" content="<?php echo $meta_desc; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="<?php echo DIRECTORY; ?>assets/scripts/utils/modernizr.min.js"></script>
        <?php foreach ( $stylesheets as $style ): ?>
            <link rel="stylesheet" href="<?php echo $style; ?>" /></head>
        <?php endforeach; ?>

    </head>
    <body>
        <div class="header">
            <div class="main_container">
                <ul class="header__logos">
                    <li><a class="header__main header__logos--logo" href="<?php echo DIRECTORY; ?>?posts=0">Saidit</a></li>
                    <li><a class="header__middle header__logos--logo" href="<?php echo DIRECTORY; ?>">Saidit</a></li>
                    <li class="header__logo--right"><a class="header__right header__logos--logo" href="<?php echo DIRECTORY; ?>">Saidit</a></li>
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <div class="filter-bar">
            <div class="main_container">
                <?php if(!$show_header_filter && !$hide_back_btn): ?>
                <a href="#" class="back-btn js-back">Back to posts</a>
                <?php endif; ?>
                <?php if(!$show_header_filter && $show_generic_back): ?>
                <a href="<?php echo DIRECTORY; ?>?posts=0" class="back-btn">Back</a>
                <?php endif; ?>
                <?php if($show_header_filter): ?>
                    <form method="post" action="<?php echo DIRECTORY; ?>?<?php if($posts_type != false): ?>posts=<?php echo $posts_type; ?><?php endif; ?><?php echo $order_by_string; ?>">
                        <ul class="tags">
                            <li>Tags:</li>
                            <li class="filter_dropdown">
                                <div class="filter_tags js-filter-tags">Filter tags <span class="filter_tags--arrow js-dropdown-arrow"></span></div>
                                <div class="filter_tags--dropdown">
                                    <ul class="filter_tags--options">
                                        <?php foreach(Posts::$tags as $key => $value): ?>
                                        <li>
                                            <label for="<?php echo $key; ?>"><?php echo $value; ?>:</label>
                                            <input type="checkbox" id="<?php echo $key; ?>" <?php if(in_array($key, $_POST['posts']['category']) || in_array($key, explode(',', $_GET['posts_category']))): ?>checked="checked"<?php endif; ?> name="posts[category][]" value="<?php echo $key; ?>">
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                            <li><input type="submit" class="go-btn" value="go"></li>
                        </ul>
                        <ul class="date_filter">
                            <li>Filter:</li>
                            <li><a href="<?php echo DIRECTORY; ?>?posts=<?php echo $posts_type; ?>&order_by=today" <?php if($_GET['order_by'] == 'today'): ?>class="active"<?php endif; ?>>Today</a></li>
                            <li><a href="<?php echo DIRECTORY; ?>?posts=<?php echo $posts_type; ?>&order_by=week" <?php if($_GET['order_by'] == 'week'): ?>class="active"<?php endif; ?>>This week</a></li>
                            <li><a href="<?php echo DIRECTORY; ?>?posts=<?php echo $posts_type; ?>&order_by=month" <?php if($_GET['order_by'] == 'month'): ?>class="active"<?php endif; ?>>This month</a></li>
                        </ul>
                    </form>
                    <?php endif; ?>
                    <div class="header__login">
                        <?php if(!!$_SESSION['user']['id']): ?>
                        <!--<a href="#" class="js-controls-action"><?php echo Users_model::get_name($_SESSION['user']['id']); ?> <?php if(Notifications_model::get($_SESSION['user']['id']) != false): ?> <span class="notifications js-notifications">(<?php echo count(Notifications_model::get($_SESSION['user']['id'])); ?>)</span> <?php endif; ?></a>-->
                        <a href="<?php echo DIRECTORY; ?>users/logout">Logout</a> | <a href="<?php echo DIRECTORY; ?>users/settings">Settings</a>
                        <div class="controls js-controls">
                            <ul>
                               <!-- <li><a href="<?php echo DIRECTORY; ?>notifications"><?php if(Notifications_model::get($_SESSION['user']['id']) != false): ?> <span class="js-notifications">(<?php echo count(Notifications_model::get($_SESSION['user']['id'])); ?>)<?php endif; ?></span> Notifcations</a></li>
                                <li><a href="<?php echo DIRECTORY; ?>post/all">My Posts</a></li>-->
                                <li><a href="<?php echo DIRECTORY; ?>users/settings">Settings</a></li>
                                <li><a href="<?php echo DIRECTORY; ?>users/logout">Logout</a></li>
                            </ul>
                        </div>
                        <?php else: ?>
                        <?php if(!$hide_login): ?>
                        <a href="<?php echo DIRECTORY; ?>users/login">Login</a>
                        <?php endif; ?>
                        <!--|
                        <a href="<?php echo DIRECTORY; ?>users/signup">Signup</a>
                        -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            