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
 * View class
 *
 * @author lgk
 */
class View extends Main {
    public $theme_name;
    public $theme_path;
    public $template;
    
    public function __construct($opt_theme, $opt_template) {
        parent::__construct();
        
        $this->theme_name = $opt_theme;
        $this->generate_app_theme_path();
        
        $this->template = $opt_template;
    }
    
    private function generate_app_theme_path() {
        $this->theme_path = './themes/' . $this->theme_name . '.theme.php';
    }
    
    public function load_theme() {
        include $this->theme_path;
    }
    
    public function get_templates() {
        $output = array();
        $handle = scandir('./templates/');
        
        foreach ($handle as $file) {
            // Verweise auf Überordner/aktuellen Ordner werden aussortiert
            if (!($file == '.' || $file == '..') && strpos($file,'.templ.php') !== false) {
                if ($file == $this->template . '.templ.php') {
                    $is_default = true;
                }
                else {
                    $is_default = false;
                }
                
                $file_dots = explode('.', $file);
                
                $file_to_input = array();
                $file_to_input['template'] = ucwords($file_dots[0]);
                $file_to_input['template_file'] = $file;
                $file_to_input['is_default'] = $is_default;
                
                array_push($output, $file_to_input);
            }
        }   
        return $output;
    }
}
