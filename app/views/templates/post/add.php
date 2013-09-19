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
        <p><?php echo Form::textarea('notes'); ?></p>
        <p>Category:</p>
        <?php foreach(Posts::$tags as $key => $value): ?>
        <label for="<?php echo $key; ?>"><?php echo $value; ?>:</label><input type="checkbox" id="<?php echo $key; ?>" name="posts[category][]" value="<?php echo $key; ?>">
        <?php endforeach; ?>

        <p><?php echo Form::submit('submit', 'Post', 'form__submit action-grad'); ?></p>

    <?php echo Form::end_form(); ?>
    </div>
</section>
<?php include "assets/includes/aside.php"; ?>