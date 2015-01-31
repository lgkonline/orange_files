<?php

/* 
 * The MIT License
 *
 * Copyright 2015 lgk.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo $main->app_title; ?></title>
        <link rel="stylesheet" href="./css/orange_files.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php echo $theme->head; ?>
    </head>

    <body>
        <?php echo $theme->body; ?>
        
        <div class="container">
<!--            <a 
                href="<?php if ($debug) : ?>./?<?php else : ?>./?debug=true<?php endif; ?>" 
                class="btn btn-default <?php if ($debug) : ?>active<?php endif; ?> pull-right"
            >
                Debug
            </a>-->
            
            <?php if ($main->authentication == 'password') : ?>
            <a href="./?action=logout" class="btn btn-danger pull-right">
                <span class="glyphicon glyphicon-log-out"></span>
                Sign out
            </a>
            <?php endif; ?>
            
            <div class="page-header">
                <h1><?php echo $main->app_title; ?></h1>
            </div>
        </div>
        
        <?php 
            // Hier kommt die Einbindung des Layouts/Templates
            include './templates/' . $view->template . '.templ.php'; 
        ?>
        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="./js/orange_files.js"></script>
        <?php echo $theme->foot; ?>
    </body>
</html>