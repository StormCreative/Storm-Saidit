<section class="main">
    <div class="page-title"><div class="container"><h1>Settings<span class="red-text">.</span></h1></div></div>
    <div class="post-entry">
        <div class="container">
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

        <p><?php echo Form::textfield('password', 'password'); ?></p>
        <p><?php echo Form::textfield('confirm', 'password'); ?></p>
        
        <p><?php echo Form::submit('submit', 'Save', 'form__submit action__btn'); ?></p>

        <?php echo Form::end_form(); ?>
     </div>
    </div>
</section>