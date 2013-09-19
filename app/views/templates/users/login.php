<section class="main">
    <h2>Login</h2>
    <?php if($error): ?>
        <div class="error">
            <p>Unable to login - check your credentials</p>
        </div>
    <?php endif; ?>
    
    <?php echo Form::start_form('users', '', 'POST', 'form'); ?>

    <p><?php echo Form::textfield('username'); ?></p>
    <p><?php echo Form::textfield('password', 'password'); ?></p>
    
    <p><?php echo Form::submit('submit', 'Login', 'form__submit action-grad'); ?></p>

    <?php echo Form::end_form(); ?>
</section>

<?php include "assets/includes/aside.php"; ?>