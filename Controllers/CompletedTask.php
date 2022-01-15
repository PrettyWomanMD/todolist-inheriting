<?php


namespace Controllers;


use Model\Database;

class CompletedTask extends BaseController
{
    public function completedTaskPost()
    {
        $taskId = (int)filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);
        $database = new Database();
        $database->modifyTaskStatusAsCompleted($taskId);
        $this->headerLocation('/');
    }

}