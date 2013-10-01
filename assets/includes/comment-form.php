<?php if( !!$_SESSION['user']['id'] ): ?> 
<div class="comment-form" id="comment-form">
    <!-- Render comment form -->
    <?php echo Form::start_form('comments', '', 'POST', 'form'); ?>
    <p>
    	<label for="comment">Add your comment</label>
    	<textarea name="comments[body]" id="comment" class="js-comment comment-form__body"></textarea>
    </p>
    <!--<p><?php echo Form::textarea('body', 'js-comment comment-form__body'); ?></p>-->
    <p><?php //echo Form::submit('submit', 'Clear', 'form__clear action__btn'); ?><?php echo Form::submit('submit', 'Submit Comment', 'form__submit action__btn'); ?></p>
    <div class="auto-suggest js-auto-suggest"></div>
    <?php echo Form::end_form(); ?>
    <!-- End form -->
</div>
<?php else: ?>
    <p class="error">To make a comment, you need to be logged in.</p>
<?php endif; ?>
