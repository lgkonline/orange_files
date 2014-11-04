<?php
     session_start();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);

     if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {

         if( isset($_GET['key1']) && !($_GET['key1'] == '') &&
             isset($_GET['key2']) && !($_GET['key2'] == ''))
         {
             header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php?key1='.$_GET['key1'].'&key2='.$_GET['key2']);
             exit;             
         }
         elseif( isset($_GET['key1']) && !($_GET['key1'] == ''))
         {
             header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php?key1='.$_GET['key1']);
             exit;             
         }  
         elseif( isset($_GET['key2']) && !($_GET['key2'] == ''))
         {
             header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php?key2='.$_GET['key2']);
             exit;             
         }  
         else
         {
             header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
             exit;             
         }         
     }
?>