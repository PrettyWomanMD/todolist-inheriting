<?php


namespace Controllers;


use Model\Database;
use Model\Errors;

class Login extends BaseController
{
    public function getLogin()
    {
        $onLoginPage = true;
        print $this->includeTemplate('v_login', ['onLoginPage' => $onLoginPage]);
    }

    public function postLogin()
    {
        $errors = [];
        $onLoginPage = true;
        $error = new Errors();
        $database = new Database();
        $userInfo = $database->selectUserFromDatabaseByEmail($_POST['email']);

        $error->isEmpty($_POST['email'], $errors, 'email', "Field email is empty");
        if (empty($errors['email'])) {
            $error->wrongEmail($_POST['email'], $errors, 'email', 'Email isn\'t valid');
        }
        if (empty($errors['email'])) {
            $error->invalidEmail($_POST['email'], $errors, 'email');
        }


        $error->isEmpty($_POST['password'], $errors, 'password', "Field password is empty");
        if (empty($errors['password'])) {
            $error->invalidPassword($_POST['password'], $userInfo['password'], $errors, 'password');
        }

        if (empty($errors)) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['userId'] = $userInfo['id'];
            $this->headerLocation('/');
        }

        print $this->includeTemplate('v_login',
            ['errors' => $errors, 'onLoginPage' => $onLoginPage]);
    }

}