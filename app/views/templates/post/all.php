<div class="main_container">
	<section class="main">
	    <ul>
	    <?php foreach($posts as $post): ?>
	        <li><a href="<?php echo DIRECTORY; ?>post/view/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></li>
	    <?php endforeach; ?>
	    </ul>
	</section>
</div>
