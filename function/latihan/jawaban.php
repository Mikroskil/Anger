<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../jawaban.php';
require_once __DIR__.'/../latihan.php';

$user = $_SESSION['username'];
$tipe = $_POST['tipe'];
$latihan = (int)$_POST['latihan'];
$kumpulanJawaban = $_POST['jawaban'];

$daftarSoal = findSoalByLatihan($latihan, $tipe);
$jumlahSoal = count($daftarSoal);

if ($tipe == "Pilihan Ganda") {
    foreach ($daftarSoal as $key => $soal) {
        $pilgan = $soal['id'];
        if (isset($kumpulanJawaban[$key])){
            $jawaban = $kumpulanJawaban[$key];
            $hasil = ($soal['jawaban'] == $jawaban) ? 'T' : 'F';
            tambahJawabanPilihanGanda($user, $latihan, $pilgan, $jawaban, $hasil);
        }
    }
} else {

}

header("Location: ../../nilai.php");
