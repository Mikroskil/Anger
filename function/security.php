<?php

function login($username, $password){
    global $pdo;

    $sth = $pdo->prepare('
        SELECT * FROM user
        WHERE username = :user
        AND password = :pass
    ');

    $sth->execute(array(
        'user' => $username,
        'pass' => $password
    ));
    return $sth->fetch(PDO::FETCH_ASSOC);
}
