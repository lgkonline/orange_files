<div class="container">
    <?php foreach ($main->load_files() as $file_string) : 
        $file = new Files($file_string);
    ?>
    
    <?php if ($debug) : ?>
    <textarea style="width: 800px; height: 300px;"><?php print_r($file); ?></textarea><br>
    <?php endif; ?>
    
    <li><a href="<?php echo $file->full_url; ?>"><?php echo $file->basename; ?></a> <small><?php echo $file->size; ?></small></li>
    
    <?php endforeach; ?>
</div>