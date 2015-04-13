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
 * Class for each file
 *
 * @author lgk
 */

class Files extends Main {
    public $basename;
    public $filename;
    public $extension;
    public $icon;
    public $thumbnail_path;
    public $thumbnail;
    public $size;
    public $full_url;
    public $full_path;
    public $subject;
    
    
    public function __construct($file_string) {
        parent::__construct();
        
        $this->generate_fileinfo($file_string);
        $this->generate_full_url();
        $this->generate_full_path();
        $this->generate_size();
        
        $this->subject = 'default';
        
        if ($this->is_image()) {
            $this->subject = 'image';
            
            $this->generate_thumbnail_path();
            $this->generate_thumbnail();
        }
    }
    
    private function is_image() {
        if ($this->extension == 'png' || $this->extension == 'jpg' || $this->extension == 'jpeg' || $this->extension == 'gif') {
            return true;
        }
        else {
            return false;
        }     
    }

    private function generate_fileinfo($file_string) {
        $fileinfo = pathinfo($file_string);
        $this->basename = $fileinfo['basename'];
        $this->filename = $fileinfo['filename'];
        $this->extension = $fileinfo['extension'];
    }

    private function generate_full_url() {
        $this->full_url = $this->files_path . $this->basename;
    }

    private function generate_full_path() {
        $this->full_path = $this->files_path . $this->basename;
    }
    
    private function generate_size($format = null) {
        $bytes = filesize($this->full_path);
        
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824) . ' GB';
        }
        elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576) . ' MB';
        }
        elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024) . ' KB';
        }
        elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        }
        else {
            $bytes = '0 bytes';
        }    
        
        $this->size = $bytes;
    }

    private function generate_thumbnail_path() {
        $this->thumbnail_path = './thumbnails/' . $this->filename . '.jpg';
    }
    
    private function generate_thumbnail() {
        // Wenn Thumbnail noch nicht existiert -> generiere
        if (!file_exists($this->thumbnail_path)) {
            $thumbWidth = 100;

            // Lade Bild
            if ($this->extension == 'png') {
                $img = imagecreatefrompng($this->full_path);
            }
            elseif ($this->extension == 'jpg' || $this->extension == 'jpeg') {
                $img = imagecreatefromjpeg($this->full_path);
            }
            elseif ($this->extension == 'gif') {
                $img = imagecreatefromgif($this->full_path);
            }            

            $width = imagesx($img);
            $height = imagesy($img);

            // Errechne Thumbnail Größe
            $new_width = $thumbWidth;
            $new_height = floor($height * ($thumbWidth / $width));

            // Erstelle neues temporäres Bild
            $tmp_img = imagecreatetruecolor($new_width, $new_height);

            // Kopiere, resize altes Bild zum neuen
            imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $width);

            // Speicher Thumbnail als Datei
            imagejpeg($tmp_img, $this->app_full_path . $this->thumbnail_path);
        }
        
        $this->thumbnail = $this->thumbnail_path;
    }
}