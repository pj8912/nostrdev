<?php
if(!class_exists('database')){
    class database extends SQLite3{
        public function __construct($path){
            $this->open($path);
        }
    }
}