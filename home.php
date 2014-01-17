<?php
require_once __DIR__.'/function/library.php';

$username = getUsername();
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
            <h1>HALAMAN UTAMA</h1>
            <section>
                <p>
                    Website ini merupakan website matematika yang ditujukan kepada siswa SMA.
                    Dalam website ini, tersedia materi lengkap dari SMA 1 sampai SMA 3.
                    Selain itu, juga terdapat soal latihan untuk dikerjakan oleh siswa SMA beserta pembahasannya.
                    Tidak hanya itu, website ini juga memberikan fitur untuk try out UN SMA.
                </p>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
