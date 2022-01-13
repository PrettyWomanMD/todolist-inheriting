<?php


namespace Controllers;


class BaseController
{
    public function includeTemplate(string $path, array $vars = [])
    {
        ob_start();
        extract($vars);
        require_once "View/" . $path . ".php";
        return ob_get_clean();
    }

    public function headerLocation(string $location)
    {
        header("Location:" . $location);
        exit();
    }

}