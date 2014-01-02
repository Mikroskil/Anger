<?php
require_once __DIR__.'/../../config.php';
require_once __DIR__.'/../materi.php';

if (isset($_GET['id'])){
	deleteMateri($_GET['id']);
}

header("Location: ../../materi.php");