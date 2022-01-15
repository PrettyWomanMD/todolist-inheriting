<?php


namespace Model;


class Errors
{
    public function isEmpty(string $value, &$errors, string $errorKey, string $messageError)
    {
        if (empty($value)) {
            $errors[$errorKey] = $messageError;
        }
    }

    public function wrongEmail(string $email, &$errors, string $errorKey, string $messageError)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[$errorKey] = $messageError;
        }
    }

    public function passwordsDoNotMatch(string $password, string $repeatPassword, &$errors, string $errorKey)
    {
        if ($password !== $repeatPassword) {
            $errors[$errorKey] = 'The passwords don\'t match';
        }
    }

    public function invalidEmail($email,&$errors, $errorKey)
    {
        $database = new Database();
        $userInfo = $database->selectUserFromDatabaseByEmail($email);
        if (empty($userInfo)) {
            $errors[$errorKey] = 'This email isn\'t registered!';
        }
    }

    public function invalidPassword($postPassword, $databasePassword, &$errors, $errorKey)
    {
        if (!password_verify($postPassword, $databasePassword)) {
            $errors[$errorKey] = 'Invalid password';
        }
    }

}