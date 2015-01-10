<?php

// Über ?debug=true wird der Debug-Modus aktiviert
// Dies sollte in der finalen Version auskommentiert/entfernt werden
if (filter_input(INPUT_GET, 'debug')) {
    $debug = true;
}
else {
    $debug = false;
}

// Klassen werden eingebunden
require_once './classes/Main.class.php';
require_once './classes/View.class.php';
require_once './classes/Files.class.php';
//

$main = new Main();

/* ----------------------*/

////* WELCOME! *////

/*
 * From here you can start customizing your orange_files installation.
 */

/* Title */
$main->app_title = 'My files';

/* Files path */
$main->files_path = './files/';


/* Authentication ('none'|'password') */
$main->authentication = 'none';
$main->authentication_password = '123456'; // Only works when $main->authentication = 'password'

/* Template */
$opt_template = 'default';

/* Theme */
$opt_theme = 'default';


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

$view = new View($opt_theme, $opt_template);
$view->load_theme();
$theme = new Theme();
include './views/files.view.php';

