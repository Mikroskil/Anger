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

function findSoalperSiswa($user, $latihan){
    global $pdo;

    $sth = $pdo->prepare('
        SELECT * FROM jawaban_pilgan
        WHERE id_user = :user AND id_latihan = :latihan
    ');

    $sth->execute(array(
        'user' => $user,
        'latihan' => $latihan
    ));
    
    return $sth->fetchAll(PDO::FETCH_BOTH);
}
