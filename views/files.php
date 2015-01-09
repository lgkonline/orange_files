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
        <?php echo $theme->head; ?>
    </head>

    <body>
        <?php echo $theme->body; ?>
        
        <div class="container">
            <a 
                href="<?php if ($debug) : ?>./?<?php else : ?>./?debug=true<?php endif; ?>" 
                class="btn btn-default <?php if ($debug) : ?>active<?php endif; ?> pull-right"
            >
                Debug
            </a>
            
            <div class="page-header">
                <h1><?php echo $main->app_title; ?></h1>
            </div>
        </div>
        
        <?php 
            // Hier kommt die Einbindung des Layouts/Templates
            include './templates/default.templ.php'; 
        ?>
        
        <?php echo $theme->foot; ?>
    </body>
</html>