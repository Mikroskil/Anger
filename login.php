<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/function/security.php';
require_once __DIR__.'/function/session.php';

$username = $_POST['user'];
$password = $_POST['pass'];
session_start();

if ($username == '' || $password == ''){
    setSession('error', 'Username atau Password tidak boleh kosong');
} else if (login($username, $password)){
    setSession('username', $username);
} else {
	setSession('error', 'Username atau Password salah');
}
header('Location: index.php');

?>
