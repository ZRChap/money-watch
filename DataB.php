<?php


class DB {


    public function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        } catch(PDOException $e) {
             die($e->getMessage());
        }
    }

    















}