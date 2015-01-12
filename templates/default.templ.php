<div class="container">
    <div class="row">
        <?php foreach ($main->load_files() as $file_string) : 
            $file = new Files($file_string);
        ?>

        <?php if ($debug) : ?>
        <textarea style="width: 800px; height: 300px;"><?php print_r($file); ?></textarea><br>
        <?php endif; ?>

        <div class="col-sm-3 of-file">
            <a href="<?php echo $file->full_url; ?>" class="btn btn-default of-file-link of-tooltip" title="<?php echo $file->basename; ?>" style="width: 100%;">
                <span class="fa-stack fa-lg of-file-extension-<?php echo $file->extension; ?>">
                    <?php if (isset($file->thumbnail)) : ?>
                    <img src="<?php echo $file->thumbnail; ?>" width="100%" height="100%">
                    <?php else : ?>
                    <span class="fa-stack-1x filetype-text"><?php echo strtoupper($file->extension); ?></span>
                    <i class="fa fa-file-o fa-stack-2x"></i>
                    <?php endif; ?>
                </span>              

                <?php echo $file->basename; ?>
                <small>(<?php echo $file->size; ?>)</small>
            </a> 
        </div><!--/.of-file-->

        <?php endforeach; ?>        
    </div><!--/.row-->
</div>