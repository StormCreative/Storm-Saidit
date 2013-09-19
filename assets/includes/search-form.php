<div class="search">
    <h2>Filter results:</h2>
    <form method="post" action="<?php echo DIRECTORY; ?>">
        <label for="design">Design:</label><input type="checkbox" id="design" <?php echo checked_array('category', 'design'); ?> name="category[]" value="design">
        <label for="web">Web:</label><input type="checkbox" id="web" <?php echo checked_array('category', 'web'); ?> name="category[]" value="web">
        <label for="inspiration">Inspiration:</label><input type="checkbox" id="inspiration" <?php echo checked_array('category', 'inspiration'); ?> name="category[]" value="inspiration">
        <label for="misc">Misc:</label><input type="checkbox" id="misc" <?php echo checked_array('category', 'misc'); ?> name="category[]" value="misc">
        <label for="funny">Funny:</label><input type="checkbox" id="funny" <?php echo checked_array('category', 'funny'); ?> name="category[]" value="funny">
        <input type="submit" name="filter" value="Go!">
    </form>
</div>
    