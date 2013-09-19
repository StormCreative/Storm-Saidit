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
            <p class="header__login">
                <?php if(!!$_SESSION['user']['id']): ?>
                <a href="#" class="js-controls-action"><?php echo Users_model::get_name($_SESSION['user']['id']); ?> <?php if(Notifications_model::get($_SESSION['user']['id']) != false): ?> <span class="notifications js-notifications">(<?php echo count(Notifications_model::get($_SESSION['user']['id'])); ?>)</span> <?php endif; ?></a>
                <div class="controls js-controls">
                    <ul>
                        <li><a href="<?php echo DIRECTORY; ?>notifications"><?php if(Notifications_model::get($_SESSION['user']['id']) != false): ?> <span class="js-notifications">(<?php echo count(Notifications_model::get($_SESSION['user']['id'])); ?>)<?php endif; ?></span> Notifcations</a></li>
                        <li><a href="<?php echo DIRECTORY; ?>post/all">My Posts</a></li>
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
        <div class="wrapper">
            