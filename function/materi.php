<?php
require_once __DIR__.'/../config.php';

function getMateri(){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM materi');

    $sth->execute();
    return $sth->fetchAll();
}

function findOneMateri($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM materi WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch();
}
