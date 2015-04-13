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
        <div class="navbar navbar-default">
            
        </div>
        
        <?php echo $theme->body; ?>
        
        <div class="container">
            
            <div class="page-header">
                <h1><?php echo $main->app_title; ?></h1>
            </div>
        </div>
        
        <div id="of-login">
            <div class="container">
                <div id="of-login-panel" class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Authentication</h3>
                    </div>

                    <div class="panel-body">
                        <form class="form" action="./?action=login" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Password" name="password">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-log-in"></span>
                                    Sign in
                                </button>
                            </div>
                        </form>    
                        
                        <?php if (filter_input(INPUT_GET, 'password') == 'false') : ?>
                        <div class="alert alert-danger">
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign""></span> 
                                The entered password is not correct.
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div><!--/#of-login-->
        
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="./js/orange_files.js"></script>
        <?php echo $theme->foot; ?>
    </body>
</html>