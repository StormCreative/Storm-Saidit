<!doctype html>
<!--[if IE 8]><html class="ie8" dir="ltr" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" dir="ltr" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html dir="ltr" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Storm Creative" />

        <title>Saidit - I did.</title>
        <meta name="keywords" content="<?php echo $meta_keywords; ?>">
        <meta name="description" content="<?php echo $meta_desc; ?>">

        <script src="<?php echo DIRECTORY; ?>assets/scripts/utils/modernizr.min.js"></script>
        <?php foreach ( $stylesheets as $style ): ?>
            <link rel="stylesheet" href="<?php echo $style; ?>" /></head>
        <?php endforeach; ?>

    </head>
    <body>
        <div class="header">
            <h1><a href="<?php echo DIRECTORY; ?>" class="header__logo">Saidit.</a></h1>
        </div>
        <div class="wrapper">
            <div class="filter-bar">
                <ul class="tags">
                    <li>Tags:</li>
                    <li class="filter_dropdown">
                        <div class="filter_tags js-filter-tags">Filter tags <span class="filter_tags--arrow js-dropdown-arrow"></span></div>
                        <div class="filter_tags--dropdown">
                            <ul class="filter_tags--options">
                                <li><label for="option1">Option 1</label><input type="checkbox" name="option1" value="option1" id="option1"></li>
                                <li><label for="option2">Option 2</label><input type="checkbox" name="option2" value="option2" id="option2"></li>
                                <li><label for="option3">Option 3</label><input type="checkbox" name="option3" value="option3" id="option3"></li>
                                <li><label for="option4">Option 4</label><input type="checkbox" name="option4" value="option4" id="option4"></li>
                            </ul>
                        </div>
                    </li>
                    <li><input type="submit" class="go-btn" value="go"></li>
                </ul>
                <ul class="date_filter">
                    <li>Filter:</li>
                    <li><a href="">Today |</a></li>
                    <li><a href="">This week |</a></li>
                    <li><a href="">This month</a></li>
                </ul>
                <p class="header__login">
                    <?php if(!!$_SESSION['user']['id']): ?>
                    <a href="#" class="js-controls-action"><?php echo Users_model::get_name($_SESSION['user']['id']); ?> <?php if(Notifications_model::get($_SESSION['user']['id']) != false): ?> <span class="notifications js-notifications">(<?php echo count(Notifications_model::get($_SESSION['user']['id'])); ?>)</span> <?php endif; ?></a>
                    <div class="controls js-controls">
                        <ul>
                           <!-- <li><a href="<?php echo DIRECTORY; ?>notifications"><?php if(Notifications_model::get($_SESSION['user']['id']) != false): ?> <span class="js-notifications">(<?php echo count(Notifications_model::get($_SESSION['user']['id'])); ?>)<?php endif; ?></span> Notifcations</a></li>
                            <li><a href="<?php echo DIRECTORY; ?>post/all">My Posts</a></li>-->
                            <li><a href="<?php echo DIRECTORY; ?>users/settings">Settings</a></li>
                            <li><a href="<?php echo DIRECTORY; ?>users/logout">Logout</a></li>
                        </ul>
                    </div>
                    <?php else: ?>
                    <a href="<?php echo DIRECTORY; ?>users/login">Login</a>
                    |
                    <a href="<?php echo DIRECTORY; ?>users/signup">Signup</a>
                    <?php endif; ?>
                </p>
            </div>
            