<?php
require_once __DIR__.'/../config.php';

function getTipeLatihan(){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM tipe_latihan');

    $sth->execute();
    return $sth->fetchAll();
}

function findTipe($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT tipe FROM tipe_latihan WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch();
}

function findOneLatihan($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM latihan WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch();
}

function findLatihanByTipe($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM latihan WHERE id_tipe = :id_tipe');

    $sth->execute(array('id_tipe' => $id));
    return $sth->fetchAll();
}

function findSoalByLatihan($id, $tipe){
    global $pdo;

    if ($tipe == "Pilihan Ganda"){
	    $sth = $pdo->prepare('SELECT * FROM pilihan_ganda WHERE id_latihan = :id_latihan');

	    $sth->execute(array('id_latihan' => $id));
	    return $sth->fetchAll();
	} else {
	    $sth = $pdo->prepare('SELECT * FROM isian WHERE id_latihan = :id_latihan');

	    $sth->execute(array('id_latihan' => $id));
	    return $sth->fetchAll();
	}
}
