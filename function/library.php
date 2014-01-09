<?php
require_once __DIR__.'/../config.php';

session_start();

function getRole($username){
    global $pdo;

    $sth = $pdo->prepare('
    	SELECT r.role FROM user_role ur
    	INNER JOIN role r
    	ON r.id = ur.id_role
    	WHERE ur.username = :username
    ');

    $sth->execute(array('username' => $username));
    $role = $sth->fetch(PDO::FETCH_ASSOC);

    return $role['role'];
}

function getUsername(){
    return $_SESSION['username'];
}

function getLink($path){
    return $link.'/'.$path;
}
