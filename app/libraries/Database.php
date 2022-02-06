<?php

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $name = DB_NAME;

        private $stmt;
        private $pdo;
        private $error;

        public function __construct() {
            $conn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

            try {
                $this->pdo = new PDO($conn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                exit($this->error);
            }
        }

        public function query($sql) {
            $this->stmt = $this->pdo->prepare($sql);
        }

        public function bind($param, $value, $type = null) {
            switch(is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function resultsSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function resultSet() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }