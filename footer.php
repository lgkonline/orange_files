        <div id="lgkOrangeFilesMark">
            This is <a href="http://files.lgkonline.com" target="_blank">LGK Orange Files</a> version <?php echo $version; ?>. 
        </div>
            
        <div id="ownCopyright">
            <?php if (isset($ownCopyright)) { echo $ownCopyright; } ?>
        </div>
        
<?php

echo $pluginFooter;

if ($showBanner == 'yes') {
    echo '
    <br /><br /><br /><br /><br /><br /><br /><br /><hr />
    <center><iframe src="http://lgkonline.de/files/start-werbebanner/lgkstart.html" style="width: 728px; height: 90px;" frameborder="0" scrolling="no"></iframe></center>  
    ';    
}

?>   
</div><!-- container -->   
        
    </body>
</html>