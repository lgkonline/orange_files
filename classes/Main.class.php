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

/**
 * The main class
 *
 * @author lgk
 */
class Main {
    public $app_full_url;
    public $app_full_path;
    public $app_title;
    public $files_path;
    public $authentication;
    public $authentication_password;
    
    public function __construct() {
        $this->app_full_url = $this->server_info('REQUEST_SCHEME') . '://' . $this->server_info('HTTP_HOST') . dirname($this->server_info('PHP_SELF')) . '/';
        $this->app_full_path = dirname($this->server_info('SCRIPT_FILENAME')) . '/';
        $this->app_title = 'My files';
        $this->files_path = './files/';
        
        $this->authentication = 'none';
        $this->authentication_password = '123456';
    }
    
    // Liest Dateien aus dem gegebenen Ordner aus und gibt diese zurück
    public function load_files() {
        $output = array();
        $handle = scandir($this->files_path);
        
        foreach ($handle as $file) {
            // Verweise auf Überordner/aktuellen Ordner werden aussortiert
            if (!($file == '.' || $file == '..')) {
                array_push($output, $file);
            }
        }
        return $output;
    }
    
    public function server_info($var) {
        return filter_input(INPUT_SERVER, $var);
    }
}