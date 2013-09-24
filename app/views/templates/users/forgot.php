<section class="main">
    <h1 class="page-title">Forgotten Password</h1>
    <div class="post-entry">
        <?php if($error): ?>
            <div class="error">
                <p>Unable to login - check your credentials</p>
            </div>
        <?php endif; ?>
        <?php if(!$success): ?>
        <?php echo Form::start_form('users', '', 'POST', 'form'); ?>

        <p><?php echo Form::textfield('username'); ?></p>
        
        <p><?php echo Form::submit('submit', 'Submit', 'form__submit action__btn'); ?></p>

        <?php echo Form::end_form(); ?>
    	<?php else: ?>
		<p>A temporary password has been sent to your email address.</p>
		<?php endif; ?>
        <a href="<?php echo DIRECTORY; ?>users/login"><< Login</a>
    </div>
</section>