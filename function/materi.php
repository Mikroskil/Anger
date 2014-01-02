<?php
require_once __DIR__.'/../config.php';

function getKategori(){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM kategori');

    $sth->execute();
    return $sth->fetchAll();
}

function findOneKategori($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM kategori WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch();
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

function deleteMateri($id){
    global $pdo;

    $sth = $pdo->prepare('DELETE FROM materi WHERE id = :id');

    $sth->execute(array('id' => $id));
}

function editMateri($id, $judul, $kategori, $isi){
    global $pdo;

    $sth = $pdo->prepare('UPDATE materi SET
        judul = :judul,
        id_kategori = :id_kategori,
        isi = :isi
        WHERE id = :id
    ');

    $sth->execute(array('id' => $id, 'judul' => $judul, 'id_kategori' => $kategori, 'isi' => $isi));
}

function tambahMateri($judul, $kategori, $isi){
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO materi(judul, id_kategori, isi) VALUES (:judul, :id_kategori, :isi)');

    $sth->execute(array('judul' => $judul, 'id_kategori' => $kategori, 'isi' => $isi));
}