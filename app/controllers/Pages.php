<?php
    class Pages extends Controller {
        public function __construct() {
            $this->productModel = $this->model('Product');
        }

        public function index() {
            $products = $this->productModel->getUsers();

            $data = [
                'title' => 'Woah',
                'products' => $products
            ];

            $this->view('index', $data);
        }

        public function about() {
            $this->view('about');
        }
    }