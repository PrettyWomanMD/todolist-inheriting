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

    public function selectUserFromDatabaseByEmail(string $email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function insertNewTaskIntoDatabase($title, $text, $author)
    {
        $sql = "INSERT INTO tasks (title, text, task_data, author) VALUES (:title, :text, NOW(), :author);";
        $query = $this->db->prepare($sql);
        $query->bindValue(":title", $title, PDO::PARAM_STR);
        $query->bindValue(":text", $text, PDO::PARAM_STR);
        $query->bindValue(":author", $author, PDO::PARAM_INT);
        $query->execute();
    }

    public function selectAllTasksByUser($userId)
    {
        $sql = "SELECT * FROM tasks LEFT JOIN users ON tasks.author = users.id WHERE author = :userId And status = 0 ORDER BY task_data DESC ;";
        $query = $this->db->prepare($sql);
        $query->bindValue(':userId', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modifyTaskStatusAsCompleted($taskId)
    {
        $sql = "UPDATE tasks SET status = 1 WHERE id_task = :taskId";
        $query = $this->db->prepare($sql);
        $query->bindValue(':taskId', $taskId, PDO:: PARAM_INT);
        $query->execute();
    }

}