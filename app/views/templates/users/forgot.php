<section class="main">
    <div class="page-title"><div class="container"><h1>Forgotten Password</h1></div></div>
    <div class="post-entry">
        <div class="container">
            <?php if($error): ?>
                <div class="error">
                    <p>Cannot find your email address in the system.</p>
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
    </div>
</section>