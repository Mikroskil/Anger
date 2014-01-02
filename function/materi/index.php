<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../materi.php';

if ($_GET['action'] == 'edit'){
	editMateri($_POST['id'], $_POST['judul'], $_POST['kategori'], $_POST['isi']);
} else {
	tambahMateri($_POST['judul'], $_POST['kategori'], $_POST['isi']);
}

header("Location: ../../materi.php");