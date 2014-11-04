<?php

include('OPTIONS.php');

if ($enableKeys == 'no') {
    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);    
    
    header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
            exit;
}

$countKeys = count($key);


if (!isset($_GET['key1']))
    $_GET['key1'] = '';

if (!isset($_GET['key2']))
    $_GET['key2'] = '';

if (!$_GET['key1'] == '') {
    $extraScript = "
    <script type=\"text/javascript\">
        $(document).ready(function() {
            $('#key1').val('".$_GET['key1']."');
            $('#key2').val('".$_GET['key2']."');
            
            $('#key2').focus();
        });
    </script>
    ";
}

if ((!$_GET['key1'] == '') && (!$_GET['key2'] == '')) {
    
    if ($lang == 'eng') {
        $box = '
            <div class="alert alert-info">
                <p>The keys are already set.</p>
                <p>So you only have to press Enter.</p>
            </div>
        ';        
    }    
    
    if ($lang == 'deu') {
        $box = '
            <div class="alert alert-info">
                <p>Die Keys sind bereits gesetzt.</p>
                <p>Du brauchst also nur noch auf Enter zu drücken.</p>
            </div>
        ';        
    }
}
else {
    if ($lang == 'eng') {
        $box = '
            <div class="alert alert-info">
                <p>Please enter the keys to get to the next page.</p>
            </div>
        ';     
    }    
    
    if ($lang == 'deu') {
        $box = '
            <div class="alert alert-info">
                <p>Bitte trage die Keys ein, um zur nächsten Seite zu gelangen.</p>
            </div>
        ';        
    }    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $keyP1 = $_POST['key1'];
    $keyP2 = $_POST['key2'];

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    // Benutzername und Passwort werden überprüft
    
    $i = 0;
    
    // Überprüft Übereinstimmung der Keys
    while ($i < $countKeys) {
        if ($keyP1 == $key[$i][0] && $keyP2 == $key[$i][1]) {
            $_SESSION['angemeldet'] = true;
    
            // Weiterleitung zur geschützten Startseite
            if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
                if (php_sapi_name() == 'cgi') {
                    header('Status: 303 See Other');
                }
                
                else {
                    header('HTTP/1.1 303 See Other');
                }
            }
    
            header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
            exit;
        }
        
        else {
            if ($lang == 'eng') {
            $box = '
                <div class="alert alert-danger">
                    <p>One of the keys or both are not correct.</p>
                </div>
            ';    
            }    
            
            if ($lang == 'deu') {
                $box = '
                    <div class="alert alert-danger">
                        <p>Mindestens eins der Keys ist nicht korrekt.</p>
                    </div>
                ';        
            }          
        }
        
        $i++;
    }// Ende von while
    
}

include('header.php');
?>
<div class="container">
								<div class="page-header">
        	<h1><?php echo $siteName; ?></h1>
									</div>
        <form action="login.php" method="post">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"></i></span>
											<input type="text" class="form-control" name="key1" id="key1">
											
											<span class="input-group-addon">-</span>
											<input type="text" class="form-control" name="key2" id="key2">
										</div>
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg" style="width: 100%;"><i class="fa fa-sign-in"></i> <?php
                if ($lang == 'eng') {
                    echo 'OK, go on';  
                }    
                
                if ($lang == 'deu') {
                    echo 'OK, weiter';       
                }                 
            ?></button>
										</div>
        </form>
        
        <?php 
            if(isset($box))
               echo $box;
        ?>

<?php include('footer.php');


?>