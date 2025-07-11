<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'futsal';
    private $user = 'root';
    private $pass = '';

    public function getConnection() {
        try {
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}
