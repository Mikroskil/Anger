<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../jawaban.php';
require_once __DIR__.'/../latihan.php';
require_once __DIR__.'/../library.php';

$user = getUsername();
$tipe = $_POST['tipe'];
$latihan = $_POST['latihan'];
$kumpulanJawaban = $_POST['jawaban'];

$daftarSoal = findSoalByLatihan($latihan, $tipe);
$jumlahSoal = count($daftarSoal);

if ($tipe == "Pilihan Ganda") {
    foreach ($daftarSoal as $key => $soal) {
        $pilgan = $soal['id'];
        if (isset($kumpulanJawaban[$key])){
            $jawaban = $kumpulanJawaban[$key];
            $hasil = ($soal['jawaban'] == $jawaban) ? 1 : 0;
            tambahJawabanPilihanGanda($user, $latihan, $pilgan, $jawaban, $hasil);
        } else {
            tambahJawabanPilihanGanda($user, $latihan, $pilgan, 'F', 0);
        }
    }
} else {
    $target = '../../uploads/'.basename($_FILES['jawaban']['name']);
    move_uploaded_file($_FILES['jawaban']['tmp_name'], $target);
    tambahJawabanIsian($user, $latihan, $_FILES['jawaban']['name']);
}

header("Location: ../../nilai.php");
