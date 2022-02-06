<?php
    class Products extends Controller {
        public function __construct() {
            $this->productModel = $this->model('Product');
        }

        public function index() {
            $data = [
                'title' => 'Product List',
                'css' => URL_ROOT . '/css/styles.css',
                'scripts' => [
                    'jquery' => URL_ROOT . '/js/jquery-3.6.0.min.js',
                    'script' => URL_ROOT . '/js/index.js',
                ],
                'js_config' => [
                    'get_url' => URL_ROOT . '/get_products',
                    'del_url' => URL_ROOT . '/delete_products',
                    'add_url' => URL_ROOT . '/add_product',
                ]
            ];

            $this->view('index', $data);
        }

        public function add_product() {
            $data = [
                'title' => 'Product Add',
                'css' => URL_ROOT . '/css/styles.css',
                'scripts' => [
                    'jquery' => URL_ROOT . '/js/jquery-3.6.0.min.js',
                    'script' => URL_ROOT . '/js/add.js',
                ],
                'js_config' => [
                    'post_url' => URL_ROOT . '/insert_product',
                    'index_url' => URL_ROOT . '/',
                ]
            ];

            $this->view('add_product', $data);
        }

        public function get_products() {
            $products = $this->productModel->getProducts();

            echo json_encode($products);
        }

        public function delete_products() {
            if (isset($_POST['ids'])) {
                $products = $this->productModel->deleteProducts($_POST['ids']);

                echo json_encode($products);
            }
        }

        public function insert_product() {
            if (isset($_POST['product']) && is_array($_POST['product'])) {
                $output = [
                    'status' => 'success',
                    'message' => 'The product was added to Database'           
                ];

                $product = $_POST['product'];

                if ($product['sku'] == '' || $product['name'] == '' || $product['price'] == '' || 
                    ($product['type'] == 'dvd' && $product['size'] == '') ||
                    ($product['type'] == 'book' && $product['weight'] == '') ||
                    ($product['type'] == 'furniture' && ($product['height'] == '' || $product['width'] == '' || $product['length'] == ''))) {
                        $output = [
                            'status' => 'error',
                            'message' => 'Please, submit required data'           
                        ];
                }

                if (!is_numeric($product['price']) || 
                    ($product['type'] == 'dvd' && !is_numeric($product['size'])) || 
                    ($product['type'] == 'book' && !is_numeric($product['weight'])) || 
                    ($product['type'] == 'furniture' && (!is_numeric($product['height']) || !is_numeric($product['width']) || !is_numeric($product['length'])))) {
                        $output = [
                            'status' => 'error',
                            'message' => 'Please, provide the data of indicated type'           
                        ];
                }

                if ($output['status'] == 'success') {
                    $this->productModel->insertProduct($product);
                }

                echo json_encode($output);
            }
        }
    }