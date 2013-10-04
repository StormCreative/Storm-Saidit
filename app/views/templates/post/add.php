
<div class="main_container">
    <section class="main">
        <div class="page-title"><h1>Post a link<span class="red-text">.</span></h1></div>
        <div class="post-entry">
        <?php if(count($errors) > 0 ): ?>
            <div class="error">
                <p>Woah! See below:</p>
                <?php foreach( $errors as $error ): ?>
                    <li><?php echo ucfirst($error['message']); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php echo Form::start_form('posts', '', 'POST', 'form', 'js-posts-form'); ?>
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
            <div class="post-holder">
                <label class="main_label">Select Tags:</label>
                 <p class="post_tags_inline">
                    <?php foreach(Posts::$tags as $key => $value): ?>
                    <label for="<?php echo $key; ?>"><?php echo ucfirst($value); ?>:</label>
                    <input type="checkbox" id="<?php echo $key; ?>" name="posts[category][]" value="<?php echo $key; ?>">
                    <?php endforeach; ?>
                 </p>
            </div>

            <div class="js-upload-container" data-type="image"></div>

            <div>
                <div class="file-upload-js images_upload">                         
                    <label class="main_label js-upload-label hide">Upload Image</label><div type="button" name="image_upload" data-type="image" id="image_upload"/></div>
                </div>
                <div id="image-list-js"></div>
            </div>

            <p class="display_block">
                <?php echo Form::submit('submit', 'Post', 'form__submit action__btn'); ?>
                <span class="js-ajax-loader hide">
                    <img src="<?php echo DIRECTORY; ?>assets/images/ajax-loader.gif" />
                </span>
            </p>

        <?php echo Form::end_form(); ?>
        </div>
    </section>
</div>

<script>
    var number_of_images = 999;
</script>