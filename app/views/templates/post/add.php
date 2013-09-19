<section class="main">
    <div class="post-entry">
    <?php if(count($errors) > 0 ): ?>
        <div class="error">
            <p>Woah! See below:</p>
            <?php foreach( $errors as $error ): ?>
                <li><?php echo ucfirst($error['message']); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php echo Form::start_form('posts', '', 'POST', 'form'); ?>

        <p><?php echo Form::textfield('title'); ?></p>
        <p><?php echo Form::textfield('link'); ?></p>

        <p>Category:</p>
        <label for="design">Design:</label><input type="checkbox" id="design" name="posts[category][]" value="design">
        <label for="web">Web:</label><input type="checkbox" id="web" name="posts[category][]" value="web">
        <label for="web">Inspiration:</label><input type="checkbox" id="inspiration" name="posts[category][]" value="inspiration">
        <label for="misc">Misc:</label><input type="checkbox" id="misc" name="posts[category][]" value="misc">
        <label for="funny">Funny:</label><input type="checkbox" id="funny" name="posts[category][]" value="funny">

        <p><?php echo Form::submit('submit', 'Post', 'form__submit action-grad'); ?></p>

    <?php echo Form::end_form(); ?>
    </div>
</section>
<?php include "assets/includes/aside.php"; ?>