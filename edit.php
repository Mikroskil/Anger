<?php
require_once __DIR__.'/function/profil.php';
require_once __DIR__.'/function/library.php';

$user = getUsername();
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$sekolah = $_POST['sekolah'];
$jk = $_POST['jk'];
$hp = $_POST['hp'];

editProfil($nama, $tempat, $tanggal, $sekolah, $jk, $hp, $user);

header('Location: profil.php');