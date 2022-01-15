<?php

use Controllers\CompletedTask;
use Controllers\Index;
use Controllers\Login;
use Controllers\Logout;
use Controllers\Registration;

require_once 'init.php';

if (($url === '') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $index = new Index();
    $index->getIndex();
}

if (($url === '') && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $index = new Index();
    $index->postIndex();
}
if (($url === '/login') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $login = new Login();
    $login->getLogin();
}

if (($url === '/login') && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $login = new Login();
    $login->postLogin();
}

if (($url === '/registration') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $registration = new Registration();
    $registration->getRegistration();
}

if (($url === '/registration') && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $registration = new Registration();
    $registration->postRegistration();
}

if ((strpos($_SERVER['REQUEST_URI'], "/completedTask/") === 0) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $completed = new CompletedTask();
    $completed->completedTaskPost();
}

if (($url === '/logout') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $logout = new Logout();
    $logout->logout();
}
