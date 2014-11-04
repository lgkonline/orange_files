<?php

$handle = opendir ('plugins');

$pluginFooter = '<div class="pluginCopyright">';

while ($plugin = readdir($handle)) {
    if (!($plugin == '.' | $plugin == '..' | $plugin == 'placeholder.txt')) 
        include('plugins/'.$plugin.'/'.$plugin.'.php');
    
}

$pluginFooter .= '</div>';

?>