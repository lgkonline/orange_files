<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <meta name="mobileoptimized" content="0"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="format-detection" content="telephone=yes"/>         
        <title><?php echo $siteName; ?></title>
        
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
					<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/fileTypes.css" />
        
        <?php if (isset($ownCopyrightStyle)) echo $ownCopyrightStyle; ?>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="script.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#key1').focus();
            });
        </script>
        
        <?php echo $pluginHeader; ?>
        
        <?php
            if(isset($extraScript))
                echo $extraScript;
        ?>
        
        <style type="text/css">
            .error-box {
                display: none;
            }
        </style>
    </head>
        
    <body>