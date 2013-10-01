<section class="main">
    <h2>Signup</h2>
    <?php if($errors): ?>
        <div class="error">
            <p>Woah! See below:</p>
            <?php foreach( $errors as $error ): ?>
                <li><?php echo ucfirst($error['message']); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <!-- Render register form -->
    <?php echo Form::start_form('users', '', 'POST', 'form'); ?>
    <p>
        <label for="name" class="form__text-label">Name: <input type="text" name="authors[name]" value="<?php if(!!$_POST['authors']['name']): echo $_POST['authors']['name']; endif; ?>"></label>
    </p>
    <p><?php echo Form::textfield('username'); ?></p>
    <p>
        <label for="name" class="form__text-label">Password: <input type="password" name="users[password]" value=""></label>
    </p>
    <p><?php echo Form::submit('submit', 'Sign up', 'form__submit action-grad'); ?></p>
    <?php echo Form::end_form(); ?>
    <!-- end form -->
</section>

<?php include "assets/includes/aside.php"; ?>