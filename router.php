<?php

use Controllers\Index;
use Controllers\Login;
use Controllers\Logout;
use Controllers\Registration;

require_once 'init.php';

if (($url === '') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $index = new Index();
    $index->getIndex();
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

if (($url === '/logout') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $logout = new Logout();
    $logout->logout();
}