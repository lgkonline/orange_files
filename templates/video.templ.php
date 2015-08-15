<style type="text/css">
#template-Video-preview > div {
    background-color: #ccc;
}

#template-Video-placeholder {
    text-align: center;
    line-height: 400px;
    vertical-align: middle;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php foreach ($main->load_files() as $file_string) : 
                $file = new Files($file_string);
            ?>
    
            <?php if ($debug) : ?>
            <textarea style="width: 800px; height: 300px;"><?php print_r($file); ?></textarea><br>
            <?php endif; ?>
    
            <div class="of-file">
                <a href="<?php echo $file->full_url; ?>" class="btn btn-default of-file-link of-tooltip" 
                target="template-Video-iframe" title="<?php echo $file->basename; ?>" style="width: 100%;">
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
        </div><!--/.col--->  
        
        <div class="col-md-8">
            <div id="template-Video-preview">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="template-Video-iframe" name="template-Video-iframe"
                        class="embed-responsive-item" src=""></iframe>
                        
                    <div id="template-Video-placeholder">
                        Choose a video or image file to see it here
                    </div>
                </div>                
                
                <!--<video controls name="media">
                    <source src="http://works.lgk.io/samytv/files/SAMYTV%20Intro.mp4" type="video/mp4">
                </video>-->
            </div>            
        </div><!--/.col--->     
    </div><!--/.row-->
</div>

<script type="text/javascript" defer>

</script>