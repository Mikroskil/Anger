<?php
require_once __DIR__.'/function/profil.php';

$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$status = $_POST['status'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$sekolah = $_POST['sekolah'];
$jk = $_POST['jk'];
$hp = $_POST['hp'];

tambahUser($user, $pass);
tambahUserRole($user, $status);
tambahProfil($nama, $tempat, $tanggal, $sekolah, $jk, $hp, $user);

header('Location: register.php');