<section class="main">
    <h1 class="page-title">Login</h1>
    <div class="post-entry">
        <?php if($error): ?>
            <div class="error">
                <p>Unable to login - check your credentials</p>
            </div>
        <?php endif; ?>
        
        <?php echo Form::start_form('users', '', 'POST', 'form'); ?>

        <p><?php echo Form::textfield('username'); ?></p>
        <p><?php echo Form::textfield('password', 'password'); ?><small><a href="<?php echo DIRECTORY; ?>users/forgot">I forgot</a></small></p>
        
        <p><label class="submit-label">Submit <?php echo Form::submit('submit', 'Login', 'form__submit action__btn'); ?></label></p>

        <?php echo Form::end_form(); ?>
    </div>
</section>