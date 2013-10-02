<aside class="side-menu">
    <!--
    <div class="widget">
        <form method="post" action="<?php echo DIRECTORY; ?>" class="search-form">
            <label for="search-input" class="widget__intro">Search:</label>
            <input type="text" name="posts[search]" class="search-form__input">
        </form>
    </div>
    -->
    <div class="widget">
        <a href="<?php echo DIRECTORY; ?>post/add" class="action__btn widget__post-btn">Add new post</a>
        <p class="widget__post-lead">Posters: <span class="widget__post-leader--total"><?php echo count(Authors_model::get_all()); ?></span></p>
        <!--
        <p class="widget__intro">Todays Top Posters:</p>
        <div class="posters">
            <?php if(Posts_model::top_posters() != false): ?>
            <dl class="posters__list">
                <?php foreach(Posts_model::top_posters() as $poster): ?>
                <dt class="posters__item">
                    <span class="posters_number"><?php echo $poster['posts_total']; ?></span> - <?php echo $poster['authors_name'] ; ?>
                </dt>
                <?php endforeach; ?>
            </dl>
            <?php else: ?>
            <p><a href="<?php echo DIRECTORY; ?>post/add">Be today's first poster</a></p>
            <?php endif; ?>
        </div>
    -->
    </div>
    <div class="widget">
        <div class="widget__filter">
            <p class="widget__filter--month">
                <a href="#" class="active js-posters-rating-ever js-posters-options">Ever</a> | <a class="js-posters-rating-month js-posters-options" href="#">This month</a>
            </p>
            <a href="#" class="js-posters-rating" data-when="ever" data-action="asc"><span class="switch_icon widget__filter--switch" data-when="ever" data-action="asc"></span></a>
        </div>
        <div class="posters_list">
            <dl class="js-posters-list">
                <?php foreach(Authors_model::get_all() as $author): ?>
                <dt><a href="<?php echo DIRECTORY; ?>?name=<?php echo $author['id']; ?>&archive=1"><?php echo $author['name']; ?></a></dt>
                <dd><?php echo Posts_model::get_posts_count($author['id']); ?></dd>
                <?php endforeach; ?>
            </dl>
        </div>
    </div>
    <!--
    <div class="widget">
        <p class="widget__intro">Latest Activity:</p>
        <ul class="activity">
        <?php foreach(Activity_model::latest() as $activity): ?>
            <li class="activity__item"><?php echo str_replace('+', ' ', htmlspecialchars_decode($activity['content'])); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    -->
</aside>