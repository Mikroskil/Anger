<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/function/security.php';
require_once __DIR__.'/function/session.php';

$username = 'david';//$_POST['user'];
$password = 'a';//$_POST['pass'];
session_start();

if ($username == '' || $password == ''){
    setSession('error', 'Username atau Password tidak boleh kosong');
}

if (login($username, $password)){
    setSession('username', $username);
    header('Location: index.php');
}

?>
