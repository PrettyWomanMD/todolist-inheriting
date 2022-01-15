<?php


namespace Controllers;


use Model\Database;
use Model\Errors;
use Model\User;

class Registration extends BaseController
{
    public function getRegistration()
    {
        $onRegisterPage = true;
        print $this->includeTemplate('v_registration', ["onRegisterPage" => $onRegisterPage]);
    }

    public function postRegistration()
    {
        $errors = [];
        $onRegisterPage = true;
        $error = new Errors();
        $error->isEmpty($_POST['name'], $errors, 'name', "Field username is empty!");

        $error->isEmpty($_POST['email'], $errors, 'email', "Field email is empty!");
        if (empty($errors['email'])) {
            $error->wrongEmail($_POST['email'], $errors, 'email', 'Email isn\'t valid');
        }

        $error->isEmpty($_POST['password'], $errors, 'password', "Field password is empty!");
        $error->isEmpty($_POST['repeatPassword'], $errors, 'repeatPassword', "Field repeat password is empty!");
        if (empty($errors['password']) && empty($errors['repeatPassword'])) {
            $error->passwordsDoNotMatch($_POST['password'], $_POST['repeatPassword'], $errors, 'passwordoDontMatch');
        }


        if (empty($errors)) {
            $user = new User($_POST['name'], $_POST['email'], $_POST['password']);
            $database = new Database();
            $database->insertUserIntoDatabase($user->getName(), $user->getEmail(), $user->getPassword());
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['userId'] = $database->lastInsertUserId();
            $this->headerLocation('/');
        }

        print $this->includeTemplate('v_registration', ["errors" => $errors, 'onRegisterPage' => $onRegisterPage]);
    }

}