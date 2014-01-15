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

function tambahJawabanIsian($user, $latihan, $jawaban){
    global $pdo;

    $sth = $pdo->prepare('
        INSERT INTO jawaban_isian
        (id_user, id_latihan, jawaban)
        VALUES
        (:user, :latihan, :jawaban)
    ');

    $sth->execute(array(
        'user' => $user,
        'latihan' => $latihan,
        'jawaban' => $jawaban
    ));
}

function findJawabanPilihanGanda($user){
    global $pdo;

    $sth = $pdo->prepare('
        SELECT j.id_user, l.judul, count(hasil) as total,
            count(CASE WHEN hasil=1 THEN 1 END) as benar
        FROM jawaban_pilgan j
        INNER JOIN latihan l on l.id=j.id_latihan
        WHERE j.id_user = :user
        GROUP BY j.id_latihan
    ');

    $sth->execute(array(
        'user' => $user
    ));
    
    return $sth->fetchAll(PDO::FETCH_BOTH);
}

function findJawabanIsian($user){
    global $pdo;

    $sth = $pdo->prepare('
        SELECT j.id_user, l.judul, jawaban, poin
        FROM jawaban_isian j
        INNER JOIN latihan l on l.id=j.id_latihan
        WHERE j.id_user = :user
        GROUP BY j.id_latihan
    ');

    $sth->execute(array(
        'user' => $user
    ));
    
    return $sth->fetchAll(PDO::FETCH_BOTH);
}

function editHasilPilihanGanda($latihan, $pilgan, $jawaban){
    global $pdo;

    $sth = $pdo->prepare('
        UPDATE jawaban_pilgan
        SET hasil = (CASE WHEN jawaban = :jawaban THEN 1 ELSE 0 END)
        WHERE id_latihan = :latihan
        AND id_pilgan = :pilgan
    ');

    $sth->execute(array('latihan' => $latihan, 'pilgan' => $pilgan, 'jawaban' => $jawaban));
}

function isPernahLatihan($username, $latihan, $tipe){
    global $pdo;

    if ($tipe == "Pilihan Ganda"){
        $sth = $pdo->prepare('
            SELECT * FROM jawaban_pilgan
            WHERE id_latihan = :latihan
            AND id_user = :username
        ');
    } else {
        $sth = $pdo->prepare('
            SELECT * FROM jawaban_isian
            WHERE id_latihan = :latihan
            AND id_user = :username
        ');
    }

    $sth->execute(array('latihan' => $latihan, 'username' => $username));
    $jawaban = $sth->fetchAll(PDO::FETCH_BOTH);

    return count($jawaban) > 0;
}
