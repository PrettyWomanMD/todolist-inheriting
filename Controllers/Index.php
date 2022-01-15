<?php


namespace Controllers;


use Model\Database;
use Model\Errors;
use Model\Task;

class Index extends BaseController
{
    public function getIndex()
    {
        $allTasks = [];
        if (isset($_SESSION['userId'])) {
            $database = new Database();
            $allTasks = $database->selectAllTasksByUser($_SESSION['userId']);
        }
        print $this->includeTemplate('v_index', ['allTasks' => $allTasks]);
    }


    public function postIndex()
    {
        $headerTemplate = $this->includeTemplate("v_header");
        $errors = [];
        $database = new Database();
        $error = new Errors();
        $userId = $_SESSION['userId'];
        $allTasks = $database->selectAllTasksByUser($userId);
        $error->isEmpty($_POST['title'], $errors, 'title', "Empty field title!");
        $error->isEmpty($_POST['text'], $errors, 'text', "Empty field content!");

        if (empty($errors)) {
            $task = new Task($_POST['title'], $_POST['text'], $userId);
            $database->insertNewTaskIntoDatabase($task->getTitle(), $task->getText(), $task->getAuthor());
            $this->headerLocation("/");
        }

        print $this->includeTemplate('v_index',
            ['allTasks' => $allTasks, 'errors' => $errors]);
    }
}