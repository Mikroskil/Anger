<?php
require_once __DIR__.'/../config.php';

function getTipeLatihan(){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM tipe_latihan');

    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_BOTH);
}

function findTipe($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT tipe FROM tipe_latihan WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function findOneLatihan($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM latihan WHERE id = :id');

    $sth->execute(array('id' => $id));
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function findLatihanByTipe($id){
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM latihan WHERE id_tipe = :id_tipe AND aktif = 1');

    $sth->execute(array('id_tipe' => $id));
    return $sth->fetchAll(PDO::FETCH_BOTH);
}

function findOneSoal($id, $tipe){
    global $pdo;

    if ($tipe == "Pilihan Ganda"){
	    $sth = $pdo->prepare('SELECT * FROM pilihan_ganda WHERE id = :id');
	} else {
	    $sth = $pdo->prepare('SELECT * FROM isian WHERE id = :id');
	}

    $sth->execute(array('id' => $id));
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function flagSoal($id, $tipe){
    global $pdo;

    if ($tipe == "Pilihan Ganda"){
	    $sth = $pdo->prepare('UPDATE pilihan_ganda SET aktif = 0 WHERE id = :id');
	} else {
	    $sth = $pdo->prepare('UPDATE isian SET aktif = 0 WHERE id = :id');
	}

    $a=$sth->execute(array('id' => $id));
}

function findSoalByLatihan($id, $tipe){
    global $pdo;

    if ($tipe == "Pilihan Ganda"){
	    $sth = $pdo->prepare('SELECT * FROM pilihan_ganda WHERE id_latihan = :id_latihan AND aktif = 1');
	} else {
	    $sth = $pdo->prepare('SELECT * FROM isian WHERE id_latihan = :id_latihan AND aktif = 1');
	}

    $sth->execute(array('id_latihan' => $id));
    return $sth->fetchAll(PDO::FETCH_BOTH);
}

function nonAktifLatihan($id){
    global $pdo;

    $sth = $pdo->prepare('UPDATE latihan SET aktif = 0 WHERE id = :id');

    $sth->execute(array('id' => $id));
}

function tambahLatihan($judul, $tipe){
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO latihan(judul, id_tipe) VALUES (:judul, :tipe)');

    $sth->execute(array('judul' => $judul, 'tipe' => $tipe));
}

function editLatihan($id, $judul){
    global $pdo;

    $sth = $pdo->prepare('UPDATE latihan SET judul = :judul WHERE id = :id');

    $sth->execute(array('id' => $id, 'judul' => $judul));
}

function tambahPilihanGanda($latihan, $soal, $jawaban, $pilihan1, $pilihan2, $pilihan3, $pilihan4, $pilihan5){
    global $pdo;

    $sth = $pdo->prepare('
        INSERT INTO
            pilihan_ganda(id_latihan, soal, jawaban, pilihan_1, pilihan_2, pilihan_3, pilihan_4, pilihan_5)
        VALUES
            (:latihan, :soal, :jawaban, :pilihan1, :pilihan2, :pilihan3, :pilihan4, :pilihan5)
    ');
    $sth->execute(array(
        'latihan' => $latihan,
        'soal' => $soal,
        'jawaban' => $jawaban,
        'pilihan1' => $pilihan1,
        'pilihan2' => $pilihan2,
        'pilihan3' => $pilihan3,
        'pilihan4' => $pilihan4,
        'pilihan5' => $pilihan5
    ));
}

function tambahIsian($latihan, $soal){
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO isian(id_latihan, soal) VALUES (:latihan, :soal)');

    $sth->execute(array('latihan' => $latihan, 'soal' => $soal));
}

function editPilihanGanda($id, $latihan, $soal, $jawaban, $pilihan1, $pilihan2, $pilihan3, $pilihan4, $pilihan5){
    global $pdo;

    $sth = $pdo->prepare('
        UPDATE pilihan_ganda
        SET soal = :soal,
            jawaban = :jawaban,
            pilihan_1 = :pilihan1,
            pilihan_2 = :pilihan2,
            pilihan_3 = :pilihan3,
            pilihan_4 = :pilihan4,
            pilihan_5 = :pilihan5
        WHERE id = :id
        AND id_latihan = :latihan
    ');
    $sth->execute(array(
        'id' => $id,
        'latihan' => $latihan,
        'soal' => $soal,
        'jawaban' => $jawaban,
        'pilihan1' => $pilihan1,
        'pilihan2' => $pilihan2,
        'pilihan3' => $pilihan3,
        'pilihan4' => $pilihan4,
        'pilihan5' => $pilihan5
    ));
}

function editIsian($id, $latihan, $soal){
    global $pdo;

    $sth = $pdo->prepare('
        UPDATE isian SET soal = :soal
        WHERE id = :id
        AND id_latihan = :latihan
    ');

    $sth->execute(array('id' => $id, 'latihan' => $latihan, 'soal' => $soal));
}
