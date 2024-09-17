<?php

class Dbh
{
    private $host = "localhost";
    private $dbname = "my_firstdb";
    private $dbusername = "root";
    private $dbpassword = "";

    // making this protected because this is very sensitive and mus'nt be accessed by anyone 
    protected function connect()
    {
        try {
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname" . $this->dbname, $this->dbusername, $this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed" . $e->getMessage());
        }
    }
}
