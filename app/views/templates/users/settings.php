<section class="main">
    <form method="post" action="" class="form">
        <p>Email Notifications:</p>
        <label for="">On:</label>
        <input type="radio" name="users[notifications]" value="0" <?php if($user['notifications'] == 0): ?>checked="checked"<?php endif; ?>>
        <label for="">Off:</label>
        <input type="radio" name="users[notifications]" value="1" <?php if($user['notifications'] == 1): ?>checked="checked"<?php endif; ?>>
        <p><input type="submit" name="submit" value="Save"></p>
    </form>
</section>
