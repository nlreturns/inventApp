<?php
// handle login
//var_dump($_POST);

include_once "classes/user.php";

$user = new User();

$user->setUserName($_POST['username']);
$user->setUserPassword($_POST['password']);

$user->login();