<section class="main">
<h2>Notifications</h2>
<?php if($notifications != false): ?>
    <ul class="notification">
    <?php foreach( $notifications as $not ): ?>
        <li <?php if($not['status'] == 0): ?>class="notification__new"<?php endif; ?>><?php echo htmlspecialchars_decode(str_replace('+', ' ', $not['content'])); ?> - <?php echo tidy_time_posted($not['create_date']); ?> ago</li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
<p>You currently have no unread notifications...</p>
<?php endif; ?>
</section>

<?php include "assets/includes/aside.php"; ?>