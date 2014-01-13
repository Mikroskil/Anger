<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../latihan.php';

if (isset($_GET['id'])){
	nonAktifLatihan($_GET['id']);
}

header("Location: ../../latihan.php");
