<section class="main">
    <h1 class="page-title">Post a link</h1>
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
        <p><?php echo Form::textfield('link'); ?><small>Copy and paste a URL from the browser address bar</small></p>
        <p><?php echo Form::textarea('notes'); ?></p>
        <p>Select Tags:</p>
        <?php foreach(Posts::$tags as $key => $value): ?>
        <label for="<?php echo $key; ?>"><?php echo $value; ?>:</label>
        <input type="checkbox" id="<?php echo $key; ?>" name="posts[category][]" value="<?php echo $key; ?>">
        <?php endforeach; ?>

        <p><?php echo Form::submit('submit', 'Post', 'form__submit action__btn'); ?></p>

    <?php echo Form::end_form(); ?>
    </div>
</section>
