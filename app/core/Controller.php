<?php
    // template
    class Controller {

        public function view($view, $data = []) {
            require_once 'app/views/'.$view.'.php';
        }
        public function model($model) {
            require_once 'app/models/'.$model.'.php';
            return new $model;
        }
        public function hasRequestFile($inputFile) {
            if ( isset($inputFile) && $inputFile['error'] === 0 ) {
                return true;
            } else {
                return false;
            }
        }

    } 
?>