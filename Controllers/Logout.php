<?php


namespace Controllers;


class Logout extends BaseController
{
    public function logout()
    {
        $_SESSION = [];
        $this->headerLocation('/');
    }
}