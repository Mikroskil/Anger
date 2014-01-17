<?php
require_once __DIR__.'/../config.php';

function tambahProfil($nama, $tempat, $tanggal, $sekolah, $jk, $hp, $user){
	global $pdo;
	
	$sth = $pdo->prepare('
		INSERT INTO profil
			(nama, tempat_lahir, tanggal_lahir, nama_sekolah, jenis_kelamin, no_handphone, username)
		VALUES (:nama, :tempat, :tanggal, :sekolah, :jk, :hp, :user)
	');
	
	$sth->execute(array(
		'nama' => $nama,
		'tempat' => $tempat,
		'tanggal' => $tanggal,
		'sekolah' => $sekolah,
		'jk' => $jk,
		'hp' => $hp,
		'user' => $user
	));
}

function tambahUser($user, $pass){
	global $pdo;
	
	$sth = $pdo->prepare('
		INSERT INTO user
		VALUES (:user, :pass)
	');
	
	$sth->execute(array(
		'user' => $user,
		'pass' => $pass
	));
}

function tambahUserRole($user, $status){
	global $pdo;
	
	$sth = $pdo->prepare('
		INSERT INTO user_role
			(username, id_role)
		VALUES (:user, :role)
	');
	
	$sth->execute(array(
		'user' => $user,
		'role' => $status
	));
}

function getProfil($user){
	global $pdo;

	$sth = $pdo->prepare('
		SELECT * FROM profil p
		INNER JOIN user_role u ON u.username = p.username
		WHERE p.username = :user
	');

	$sth->execute(array('user' => $user));
	return $sth->fetch(PDO::FETCH_ASSOC);
}

function editProfil($nama, $tempat, $tanggal, $sekolah, $jk, $hp, $user){
	global $pdo;

	$sth = $pdo->prepare('
		UPDATE profil
		SET nama = :nama,
			tempat_lahir = :tempat,
			tanggal_lahir = :tanggal,
			nama_sekolah = :sekolah,
			jenis_kelamin = :jk,
			no_handphone = :hp
		WHERE username = :user
	');

	$sth->execute(array(
		'nama' => $nama,
		'tempat' => $tempat,
		'tanggal' => $tanggal,
		'sekolah' => $sekolah,
		'jk' => $jk,
		'hp' => $hp,
		'user' => $user
	));
}