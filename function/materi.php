<?php
require_once __DIR__.'/../config.php';

function getKategori(){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM kategori');

    $sth->execute();
    return $sth->fetchAll();
}

function findOneMateri($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM materi WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch();
}

function findMateriByKategori($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM materi WHERE id_kategori = :id_kategori');

    $sth->execute(array('id_kategori' => $id));
    return $sth->fetchAll();
}