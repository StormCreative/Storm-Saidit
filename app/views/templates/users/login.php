<div class="main_container">
    <section class="main">
         <div class="page-title">
             <div class="container">
                <h1>Login<span class="red-text">.</span></h1>
            </div>
        </div>
        <div class="post-entry">
            <div class="container">
                <?php if($error): ?>
                    <div class="error">
                        <p>Unable to login - check your credentials</p>
                    </div>
                <?php endif; ?>
                
                <?php echo Form::start_form('users', '', 'POST', 'form'); ?>

                <p><?php echo Form::textfield('username'); ?></p>
                <p><?php echo Form::textfield('password', 'password'); ?><small><a href="<?php echo DIRECTORY; ?>users/forgot">I forgot</a></small></p>
                
                <p><?php echo Form::submit('submit', 'Get Started', 'form__submit action__btn'); ?></p>

                <?php echo Form::end_form(); ?>
            </div>
        </div>
    </section>
</div>