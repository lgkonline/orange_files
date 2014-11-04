<?php


//                           O R A N G E   F I L E S                            // 
/*


    - SET THE KEYS         
    - NAME OF YOUR VIEWER   
    - LANGUAGE             
    - INSTALL            
    - OWN COPYRIGHT      
    - SHOW BANNER         
    - THUMBNAILS          
    - PLUGINS          
    - FINISHED !          
    

*/

/*
    ---------    SET THE KEYS    ---------

    ENGLISH:
    To add a new key pair just copy and paste one of the existing ones.
    Note that between each pair has to be a , (comma).
    
    If you want to drop a pair just take out the line.
    
    To disable the key feature set the value of $enableKeys to 'no';
    
    
    GERMAN:
    Um ein Key-Paar hinzuzufügen, kopiere einfach eins der Vorhandenen und füge es
    neu ein.
    Beachte, dass zwischen jedem Paar ein , (Komma) muss.
    
    Um ein Paar zu entfernen, lösche einfach die entsprechende Zeile.
    
    Um die Key-Funktion zu deaktivieren, setze den Wert von $enableKeys auf 'no'. 
    
*/

$enableKeys = 'no';

$key = array(
    
    array('123', '123')
);


/*
    ---------    NAME OF YOUR VIEWER    ---------

    ENGLISH:
    The site name will appear as the headline and at the title bar of the browser.
    
    
    GERMAN:
    Der Site-Name wird als Überschrift und in der Titel-Leiste des Browsers erscheinen.
    
*/

$siteName = 'My file viewer';



/*
    ---------    LANGUAGE    ---------

    ENGLISH:
    To use another language just change the variable $lang.
    
    
    GERMAN:
    Um eine andere Sprache zu wählen, ändere die Variable $lang.
    
    
    LIST OF SUPPORTED LANGUAGES:
    
    - 'eng' (English)
    - 'deu' (German)
    
*/

$lang = 'eng';



/*
    ---------    INSTALL ORANGE FILES    ---------

    ENGLISH:
    Below you find some more options.
    When everything is clear you can upload all files to your FTP server.
    
    Your own files you can upload in the folder "files".
    
    
    To share your file viewer you can use a URL where the keys are already typed in:
    
    http://your-site.com/yourfileviewer/login.php?key1=key1part1&key2=key1part2
    
    


    GERMAN:
    Weiter unten findest du weitere Optionen.
    When alles klar ist, kannst du alle Dateien auf deinen FTP-Server laden.
    
    Deine eigenen Dateien kannst du dann in den Ordner "files" hochladen.
    
    
    Um deinen Dateien-Viewer mit anderen zu teilen, kannst du eine URL benutzen, wo die
    Keys bereits eingesetzt sind:
    
    http://your-site.com/yourfileviewer/login.php?key1=TEILEINS&key2=TEILZWEI
    
*/



/*
    ---------    OWN COPYRIGHT    ---------

    ENGLISH:
    You can set an own copyright line and customize how it should look like.
    If you don't need it just delete the content and let it empty.
    
    The style is by default 'static'. When you change it to 'fixed' you
    will see it always at bottom right side of the page.
    
    
    GERMAN:
    Du kannst eine eigene Copyright-Zeile haben und festlegen, wie sie aussehen soll.
    Wenn du sie nicht brauchst, entferne einfach den Inhalt und lass es frei.
    
    Standardmäßig ist der Style 'static'. Wenn du es zu 'fixed' änderst, wirst du
    das Copyright immer rechts unten auf der Seite sehen könnnen.
    
*/



/*
    ---------    SHOW BANNER    ---------

    ENGLISH:
    The banner appears at the bottom of the page.
    If you want to hide it set the value of $showBanner to 'no'.
    
    
    GERMAN:
    Der Banner erscheint ganz unten auf der Seite.
    Wenn du ihn ausblenden willst, ändere den Wert von $showBanner auf 'no'.
    
*/

$showBanner = 'no';



/*
    ---------    THUMBNAILS    ---------

    ENGLISH:
    If you upload an image file (JPEG, PNG or GIF), this script can produce
    small previews which you can see at the viewer.
    The size of the thumbnails is much lower so your viewer hasn't to load so long.
    
    The thumbnails will generated to the folder "thumbnails'.
    
    If you delete the original file and the script will executed again the thumbnail 
    will dropped automatically.
    So you don't have to worry, that your space will consist only of thumbnails. 
    
    To disable the thumbnail feature set the value of $enableThumbnails to 'no'.
    
    
    GERMAN:
    Wenn du eine Bild-Datei (JPEG, PNG oder GIF) hochlädst, kann dieses Script kleine
    Vorschauen  erstellen, welche du dann im Viewer sehen kannst.
    
    Die Thumbnails werden im Ordner "thumbnails" generiert.
    
    Wenn du die eigentliche Datei löschst und das Script erneut ausgeführt wird, 
    wird das Thumbnail automatisch gelöscht.
    Also, keine Sorge. Dein Space wird nicht durch Thumbnails zu gespamt.
    
    Um die Thumbnail-Funktion zu deaktivieren, setze der Wert von 
    $enableThumbnails auf 'no'.
    
*/

$enableThumbnails = 'yes';



/*
    ---------    PLUGINS    ---------

    ENGLISH:
    You can download plugins from the website and install them into the folder "plugins".
    
    If you set $enablePlugins to 'no' all plugins will be disabled.
    To delete a plugin just drop the folder of the plugin.
    
    
    GERMAN:
    Du kannst Plugins von der Website herunterladen und diese in den Ordner "plugins"
    installieren.
    
    Wenn du $enablePlugins auf 'no' setzt, werden alle Plugins deaktiviert.
    Um ein Plugin zu löschen, musst du nur den entsprechenden Ordner des 
    Plugins entfernen.
    
*/

$enablePlugins = 'yes';

if (isset($_GET['plugin']) && ($_GET['plugin'] == 'off') ) {
    $enablePlugins = 'no';
}



/*
    ---------    FINISHED !    ---------

    ENGLISH:
    Okay, that should be all.
    When you edit anything after this you could destroy Orange Files.
    
    
    GERMAN:
    Okay, das wäre alles.
    Wenn du hiernach etwas änderst, könntest du Orange Files zerstören.
    
*/


/*
    -------------------------------------------------------------------------------
    -------------------------------------------------------------------------------
*/
























if (!(isset($enablePlugins)))
    $enablePlugins = '';

if (!($enablePlugins == 'yes' | $enablePlugins == 'no'))
    $enablePlugins = 'yes';

if (!(isset($enableKeys)))
    $enableKeys = '';

if (!($enableKeys == 'yes' | $enableKeys == 'no'))
    $enableKeys = 'yes';

if (!(isset($showBanner)))
    $showBanner = '';

if (!($showBanner == 'yes' | $showBanner == 'no'))
    $showBanner = 'yes';

if (!(isset($ownCopyrightStyle)))
    $ownCopyrightStyle = '';

if (!(isset($enableThumbnails)))
    $enableThumbnails = '';

if (!($enableThumbnails == 'yes' | $enableThumbnails == 'no'))
    $enableThumbnails = 'yes';

if (!(isset($ownCopyrightStyle)))
    $ownCopyrightStyle = '';

if (!($ownCopyrightStyle == 'fixed' | $ownCopyrightStyle == 'static'))
    $ownCopyrightStyle = 'static';

if ($ownCopyrightStyle == 'fixed') {
    $ownCopyrightStyle = '
    <style type="text/css">
        #ownCopyright {
            position: fixed;
            z-index: 1000;
            right: 0px;
            bottom: 0px;
            background-color: #F4F4F4;
            padding: 5px;
        }
    </style>
    ';
}

if ($ownCopyrightStyle == 'static') {
    $ownCopyrightStyle = '
    <style type="text/css">
        #ownCopyright {
            float: right;
        }
    </style>
    ';
}

if (!($lang == 'deu' | $lang == 'eng'))
    $lang = 'eng';

$version = '1.0';

$pluginHeader = '';
$pluginFooter = '';

if ($enablePlugins == 'yes')
    include('plugins.php');
?>