<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../latihan.php';

if ($_GET['action'] == 'edit'){
    $latihan = findOneLatihan($_POST['id']);
    if ($latihan['id_tipe'] == $_POST['tipe']){
        editLatihan($_POST['id'], $_POST['judul']);
    } else {
        nonAktifLatihan($_POST['id']);
        tambahLatihan($_POST['judul'], $_POST['tipe']);
    }
} else {
	tambahLatihan($_POST['judul'], $_POST['tipe']);
}

header("Location: ../../latihan.php");
