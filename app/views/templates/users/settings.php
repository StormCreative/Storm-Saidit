<section class="main">
    <h1 class="page-title">Settings</h1>
    <div class="post-entry">
        <?php if($error): ?>
            <div class="error">
                <p>Please confirm your password before saving.</p>
            </div>
        <?php endif; ?>

        <?php if($success): ?>
            <div class="success">
                <p>Your password has been successfully saved.</p>
            </div>
        <?php endif; ?>
        
        <?php echo Form::start_form('users', '', 'POST', 'form'); ?>

        </p><?php echo Form::textfield('password', 'password'); ?></p>
        <p><?php echo Form::textfield('confirm', 'password'); ?></p>
        
        <p><?php echo Form::submit('submit', 'Save', 'form__submit action__btn'); ?></p>

        <?php echo Form::end_form(); ?>
    </div>
</section>