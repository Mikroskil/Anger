<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../latihan.php';

if ($_GET['action'] == 'edit'){
    if ($_POST['tipe'] == 'Pilihan Ganda'){
        editPilihanGanda($_POST['id'], $_POST['latihan'], $_POST['soal'], $_POST['jawaban'], $_POST['pilihan-1'], $_POST['pilihan-2'], $_POST['pilihan-3'], $_POST['pilihan-4'], $_POST['pilihan-5']);
    } else {
        editIsian($_POST['id'], $_POST['latihan'], $_POST['soal']);
    }
} else {
    if ($_POST['tipe'] == 'Pilihan Ganda'){
        tambahPilihanGanda($_POST['latihan'], $_POST['soal'], $_POST['jawaban'], $_POST['pilihan-1'], $_POST['pilihan-2'], $_POST['pilihan-3'], $_POST['pilihan-4'], $_POST['pilihan-5']);
    } else {
        tambahIsian($_POST['latihan'], $_POST['soal']);
    }
}

header("Location: ../../latihan_admin.php?action=edit&tipe=$_POST[tipe]&id=$_POST[latihan]");

