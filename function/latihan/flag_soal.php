<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../latihan.php';

if (isset($_GET['id'])){
	$soal = findOneSoal($_GET['id'], $_GET['tipe']);
    flagSoal($_GET['id'], $_GET['tipe']);
}

header("Location: ../../latihan_admin.php?action=edit&tipe=$_GET[tipe]&id=$soal[id_latihan]");
