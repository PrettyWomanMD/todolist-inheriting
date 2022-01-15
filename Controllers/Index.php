<?php


namespace Controllers;


use Model\Database;
use Model\Errors;
use Model\Task;

class Index extends BaseController
{
    public function getIndex()
    {
        $headerTemplate = $this->includeTemplate("v_header");
        $allTasks = [];

        if (isset($_SESSION['email'])) {
            $database = new Database();
            $userInfo = $database->selectUserFromDatabaseByEmail($_SESSION['email']);
            $allTasks = $database->selectAllTasksByUser($userInfo['id']);

        }
        print $this->includeTemplate('v_index', ["headerTemplate" => $headerTemplate, 'allTasks' => $allTasks]);
    }


    public function postIndex()
    {
        $headerTemplate = $this->includeTemplate("v_header");
        $errors = [];
        $database = new Database();
        $error = new Errors();
        $userInfo = $database->selectUserFromDatabaseByEmail($_SESSION['email']);
        $userId = $userInfo['id'];
        $allTasks = $database->selectAllTasksByUser($userId);
        $task = new Task($_POST['title'], $_POST['text'], $userId);
        $error->isEmpty($task->getTitle(), $errors, 'title', "Empty field title!");
        $error->isEmpty($task->getText(), $errors, 'text', "Empty field content!");

        if (empty($errors)) {
            $database->insertNewTaskIntoDatabase($task->getTitle(), $task->getText(), $task->getAuthor());
            $this->headerLocation("/");
        }

        print $this->includeTemplate('v_index',
            ["headerTemplate" => $headerTemplate, 'allTasks' => $allTasks, 'errors' => $errors]);
    }
}