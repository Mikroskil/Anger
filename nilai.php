<?php
require_once __DIR__.'/function/jawaban.php';
require_once __DIR__.'/function/library.php';

$username = getUsername();
$jawabanArray = findJawaban($username);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WEBMATIKA</title>
    <link href="assets/css/layout.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="container">
        <header>
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="materi.php">Materi</a></li>
                <li><a href="latihan.php">Latihan</a></li>
                <li><a href="about.php">About</a></li>		
            </ul>		
        </header>
        <article id="content" class="layer">
            <h1>Nilai</h1>
            <section>
                <?php foreach ($jawabanArray as $jawaban): ?>
                <div class="row">
                    <div class="col-md-8"><?php echo $jawaban['judul']; ?></div>
                    <?php $nilai = round($jawaban['benar'] * 100.0 / $jawaban['total']); ?>
                    <div class="text-right"><?php echo $nilai; ?></div>
                </div>
                <?php endforeach; ?>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
