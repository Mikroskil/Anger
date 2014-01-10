<?php
require_once __DIR__.'/function/jawaban.php';

session_start();
$jawabanArray = findJawabanBenar($_SESSION['username']);
$benarArray = array();
$jumlahArray = array();
foreach ($jawabanArray as $jawaban){
    $jumlahArray[] = findJumlahSoal($jawaban['id_latihan']);
    $benarArray[] = $jawaban['benar'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once "title.php";?>
</head>
<body>
    <div id="container">
        <?php include_once "header.php";?>
        <article id="content" class="layer">
            <h1>Nilai</h1>
            <section>
                <div class="row">
                    <div class="col-md-8">k</div>
                    <div class="text-right">o</div>
                </div>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>

