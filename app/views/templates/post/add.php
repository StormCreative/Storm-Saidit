
<div class="main_container">
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
            <p>
                <label for="title" class="main_label">Title of post</label>
                <input type="text" name="posts[title]">
            </p>
            <p>
                <label for="title" class="main_label">Link</label>
                <input type="text" name="posts[link]">
                <small>Copy and paste a URL from the browser address bar</small>
            </p>
            <p>
                <label for="notes" class="main_label">Notes</label>
                <textarea name="posts[notes]"></textarea>
            </p>
            <!--
            <p><?php echo Form::textfield('title'); ?></p>
            <p><?php echo Form::textfield('link'); ?><small>Copy and paste a URL from the browser address bar</small></p>
            <p><?php echo Form::textarea('notes'); ?></p>
        -->
            <p><label class="main_label">Select Tags:</label>


            <?php foreach(Posts::$tags as $key => $value): ?>
            <label for="<?php echo $key; ?>"><?php echo $value; ?>:</label>
            <input type="checkbox" id="<?php echo $key; ?>" name="posts[category][]" value="<?php echo $key; ?>">
            <?php endforeach; ?>
            </p>

            <p><?php echo Form::submit('submit', 'Post', 'form__submit action__btn'); ?></p>

        <?php echo Form::end_form(); ?>
        </div>
    </section>
</div>
