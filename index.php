<?php 

include('OPTIONS.php');

function preview($format) {
	global $pathToFile;
	global $enableThumbnails;
	global $is_image;
	
	$output = '<div class="previewImg  img-responsive ';
	if (!($enableThumbnails == 'no')  && $is_image) {
		$output .= ' previewThumbnail';
	}
	$output .= ' preview-' . $format . '"';
	if (!($enableThumbnails == 'no')  && $is_image) {
		$output .= ' style="background-image: url(' . $pathToFile . ');"';
	}
	$output .= '>';
	$output .= '<div class="previewImgInnerDiv">' . $format . '</div>';
	$output .= '</div>';
	
	return $output;
}

if (!($enableKeys == 'no'))
    include('auth.php'); 

$fileFolder = 'files';
$thumbFolder = 'thumbnails';

include('header.php');
?>

<div class="container">
	
<?php
// Erstellen der Thumbnails
function mkThumb ($img_src, $img_width = '165', $img_height = '165', $folder_scr = 'files', $des_src = 'thumbnails')
{
    list($src_width, $src_height, $src_typ) = getimagesize($folder_scr.'/'.$img_src);
    
    if ($src_width >= $src_height)
    {
        $new_image_width = $img_width;
        $new_image_height = $src_height * $img_width / $src_width;
    }
    
    if ($src_width < $src_height)
    {
        $new_image_height = $img_width;
        $new_image_width = $src_width * $img_height / $src_height;
    }
    
    if ($src_typ == 1)      // GIF
    {
      $image = imagecreatefromgif($folder_scr."/".$img_src);
      $new_image = imagecreate($new_image_width, $new_image_height);
      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_image_width,$new_image_height, $src_width, $src_height);
      imagegif($new_image, $des_src."/".$img_src, 100);
      imagedestroy($image);
      imagedestroy($new_image);
      return true;        
    }
    
    elseif ($src_typ == 2)      // JPEG
    {
      $image = imagecreatefromjpeg($folder_scr."/".$img_src);
      $new_image = imagecreatetruecolor($new_image_width, $new_image_height);
      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_image_width,$new_image_height, $src_width, $src_height);
      imagejpeg($new_image, $des_src."/".$img_src, 100);
      imagedestroy($image);
      imagedestroy($new_image);
      return true;      
    }
    
    elseif ($src_typ == 3)      // PNG
    {
      $image = imagecreatefrompng($folder_scr."/".$img_src);
      $new_image = imagecreatetruecolor($new_image_width, $new_image_height);
      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_image_width,$new_image_height, $src_width, $src_height);
      imagepng($new_image, $des_src."/".$img_src);
      imagedestroy($image);
      imagedestroy($new_image);
      return true;   
    }
    
    else
    {
        return false;
    }
}// Erstellen der Thumbnails

// Auslesen der Thumbnails
$handleThumb = opendir ($thumbFolder);

while ($dateiThumb = readdir ($handleThumb)) {
	// Existiert die Thumbnail, die Datei aber nicht mehr, wird die Thumbnail auch gelöscht
	if (file_exists($thumbFolder.'/'.$dateiThumb) && !file_exists($fileFolder.'/'.$dateiThumb))
	{
		unlink($thumbFolder.'/'.$dateiThumb);
	}
}

?>
        <div class="page-header">
<?php
if (!($enableKeys == 'no')) {
    echo '
            <a href="logout.php" class="btn btn-primary pull-right"><i class="fa fa-sign-out"></i> Logout</a> 
    ';
}
?>
									
        	<h1><?php echo $siteName; ?></h1>
								</div>
        
        <div class="row">
        
            <?php
                
            $handle = scandir($fileFolder);

            $countFiles = 0;
    
			foreach ($handle as $datei) {
                $countFiles++;
                
                $pathToFile = $fileFolder. '/'. $datei;
                
                // If blendet Links auf höhere Ebene aus
                if (!($datei == '.' | $datei == '..')) {
                
                echo '<div class="col-md-2">';
                    
                    // Zum Ermitteln des Datentyps
                    $array = pathinfo($datei);
                    
                    echo '<a href="'. $fileFolder. '/'. $datei. '" class="fancybox" data-fancybox-group="gallery" target="_blank" title="' . $datei . '">
                            <div class="oneFile">';
                    
                    if ( (strtolower($array['extension']) == 'png') | (strtolower($array['extension']) == 'jpg') | (strtolower($array['extension']) == 'jpeg') | (strtolower($array['extension']) == 'gif') )
                    {
						$is_image = true;
						
                        if (!($enableThumbnails == 'no'))
                        {
                            mkThumb($datei);
                            $pathToFile = 'thumbnails/'. $datei;
                        }
                        /*
                            Handelt es sich um eine Bild-Datei und Thumbnails sind
                            aktiviert, wird Prozedur für Thumbnails durchgeführt.
                        */   
                        
                        $suchmuster = array(' ', '(', ')');
                        $ersetzen =   array('%20', '%28', '%29');
                        
                        $pathToFile = str_replace ($suchmuster, $ersetzen, $pathToFile);
                        /*
                            Ersetzt Sonderzeichen.
                        */
                    }
					else {
						$is_image = false;
					}
					
					echo preview(strtolower($array['extension']));
                    
                    
                    echo '<div class="fileTitle">
                                '. $datei. '
                            </div><!-- .fileTitle -->
                        </div><!-- .oneFile -->
																								
																								<div class="clearfix visible-xs visible-sm"></div>
                    </a>
                ';    
                
                echo '</div>'; // col         
      
                } // Ende des If-Befehls
                
            } // Ende der While-Schleife
    
            ?>
            
        </div><!-- #row -->
        
        <p>
            <?php 
                $countFiles = $countFiles - 2;

                echo $countFiles;
                if ($lang == 'eng') echo ' files.';
                if ($lang == 'deu') echo ' Dateien.';

                if ($countFiles == 0) {
                    if ($lang == 'eng') {
                        echo '
                            <div class="info-box">
                                <p>The folder <strong><code>files</code></strong> is empty.</p>
                            </div>
                        ';
                    }
                    
                    if ($lang == 'deu') {
                        echo '
                            <div class="info-box">
                                <p>Der Ordner <strong><code>files</code></strong> ist leer.</p>
                            </div>
                        ';
                    }
                }

            ?>
        </p>


<?php include('footer.php'); ?>