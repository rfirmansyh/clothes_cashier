<?php
    
    class Abort {
        public static function redirect($code)
        {
            require_once 'app/views/errors/'.$code.'.php';
            die;
        }
    }