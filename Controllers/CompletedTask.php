<?php


namespace Controllers;


use Model\Database;

class CompletedTask extends BaseController
{
    public function completedTaskPost()
    {
        $database = new Database();
        $database->modifyTaskStatusAsCompleted((int)filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT));
        $this->headerLocation('/');
    }

}