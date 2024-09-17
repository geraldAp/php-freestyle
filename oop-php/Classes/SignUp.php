<?php

class Signup extends Dbh
{
    private $username;
    private $pwd;
    private $email;
    public function __construct($username, $pwd, $email)
    {
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;
    }

    private function insertUser()
    {
        $query = "INSERT INTO users (username , pwd , email) VALUES (?,?,?)";

        $user_pdo = parent::connect(); // parent:: in a situation connect exists in both this side and the parent 
        $statement = $user_pdo->prepare($query);

        $statement->execute([$this->username, $this->pwd, $this->email]);

        $user_pdo = null;
        $statement = null;
    }

    private function isEmptySubmit()
    {
        if (isset($this->username) && isset($this->pwd) && isset($this->email)) {
            return false;
        } else {
            return true;
        }
    }

    public function sigUpUser()
    {
        // Error handlers 
        if ($this->isEmptySubmit()) {
            header("Location: " . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
            die();
        }

        // If no error signup user 
        $this->insertUser();
    }
}
