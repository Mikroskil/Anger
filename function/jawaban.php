<?php
require_once __DIR__.'/../config.php';

function tambahJawabanPilihanGanda($user, $latihan, $pilgan, $jawaban, $hasil){
    global $pdo;

    $sth = $pdo->prepare('
        INSERT INTO jawaban_pilgan
        (id_user, id_latihan, id_pilgan, jawaban, hasil)
        VALUES
        (:user, :latihan, :pilgan, :jawaban, :hasil)
    ');

    $sth->execute(array(
        'user' => $user,
        'latihan' => $latihan,
        'pilgan' => $pilgan,
        'jawaban' => $jawaban,
        'hasil' => $hasil
    ));
}

function findJumlahSoal($latihan){
    global $pdo;

    $sth = $pdo->prepare('
        SELECT * FROM pilihan_ganda
        WHERE id_latihan = :latihan
    ');

    $sth->execute(array(
        'latihan' => $latihan
    ));
    
    return $sth->fetchAll(PDO::FETCH_BOTH);
}

function findJawabanBenar($user){
    global $pdo;

    $sth = $pdo->prepare('
        SELECT id_user, id_latihan, count(hasil) as benar FROM jawaban_pilgan
        WHERE id_user = :user AND hasil=1
        GROUP BY id_latihan
    ');

    $sth->execute(array(
        'user' => $user
    ));
    
    return $sth->fetchAll(PDO::FETCH_BOTH);
}
