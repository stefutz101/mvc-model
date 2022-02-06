<?php
    class Controller {
        public function model($model) {
            require_once '../app/models/' . $model . '.php';

            return new $model();
        }

        public function view($view, $data = []) {
            $file = '../app/views/' . $view . '.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                exit("View does not exists.");
            }
        }
    }