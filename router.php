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
} elseif (($url === '') && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $index = new Index();
    $index->postIndex();
} elseif (($url === '/login') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $login = new Login();
    $login->getLogin();
} elseif (($url === '/login') && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $login = new Login();
    $login->postLogin();
} elseif (($url === '/registration') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $registration = new Registration();
    $registration->getRegistration();
} elseif (($url === '/registration') && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $registration = new Registration();
    $registration->postRegistration();
} elseif ((strpos($_SERVER['REQUEST_URI'], "/completedTask/") === 0) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $completed = new CompletedTask();
    $completed->completedTaskPost();
} elseif (($url === '/logout') && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $logout = new Logout();
    $logout->logout();
} else {
    print "Page not found!";
}