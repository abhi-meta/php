<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'passwd');
define('DB_DATABASE', 'myadmin');

class DatabaseConnection
{
    private $conn;
    private $result;

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($this->conn->connect_error) {
            die("<h1>Database Connection Failed</h1>");
        }
    }

    public function query($query)
    {   
        try {
            return $this->result = $this->conn->query($query);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>