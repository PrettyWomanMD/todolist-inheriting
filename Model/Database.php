<?php


namespace Model;

use PDO;
use PDOException;

class Database
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=todolist_inheriting", "root", "root");
        } catch (PDOException $exception) {
            print "Page not found!";
        }
    }

    public function insertUserIntoDatabase(string $name, string $email, string $password)
    {
        $sql = "INSERT INTO users (name, email, password, registration_data) VALUES (:name, :email, :password, NOW())";
        $query = $this->db->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $query->execute();
    }

    public function selectUserFromDatabaseByEmail(string $email ){
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }




}