<?php
    class Product extends Database {
        public function getProducts() {
            $this->query("SELECT * FROM products");

            $results = $this->resultsSet();

            return $results;
        }

        private function deleteProduct($id) {
            $this->query("DELETE FROM products WHERE products.id = :id");
            $this->bind(':id', $id);
            $result = $this->execute();

            return $result;
        }

        public function deleteProducts($ids) {
            foreach($ids as $id) {
                $result = $this->deleteProduct($id);
                
                if (!$result) {
                    exit('Something went wrong!');
                }
            }

            return $this->getProducts();
        }

        public function insertProduct($product) {
            $this->query("INSERT INTO products (sku, name, price, type, size, weight, height, width, length) VALUES (:sku, :name, :price, :type, :size, :weight, :height, :width, :length)");
            $this->bind(':sku', $product['sku']);
            $this->bind(':name', $product['name']);
            $this->bind(':price', $product['price']);
            $this->bind(':type', $product['type']);
            $this->bind(':size', $product['size']);
            $this->bind(':weight', $product['weight']);
            $this->bind(':height', $product['height']);
            $this->bind(':width', $product['width']);
            $this->bind(':length', $product['length']);
            $result = $this->execute();

            return $result;
        }
    }