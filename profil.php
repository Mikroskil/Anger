<?php
require_once __DIR__.'/function/library.php';
require_once __DIR__.'/function/profil.php';

$username = getUsername();
$profil = getProfil($username);
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
            <h1>Profil</h1>
            <section>
                <div class="row">
					<div class="col-md-4 text-left">Nama</div>
					<div class="col-md-8 text-left">: <?php echo $profil['nama']; ?></div>
				</div>
                <div class="row">
					<div class="col-md-4 text-left">Status</div>
					<div class="col-md-8 text-left">: <?php echo ($profil['id_role'] == 1)?'Siswa':'Guru'; ?></div>
				</div>
                <div class="row">
					<div class="col-md-4 text-left">Tempat Lahir</div>
					<div class="col-md-8 text-left">: <?php echo $profil['tempat_lahir']; ?></div>
				</div>
                <div class="row">
					<div class="col-md-4 text-left">Tanggal Lahir</div>
					<div class="col-md-8 text-left">: <?php echo $profil['tanggal_lahir']; ?></div>
				</div>
                <div class="row">
					<div class="col-md-4 text-left">Nama Sekolah</div>
					<div class="col-md-8 text-left">: <?php echo $profil['nama_sekolah']; ?></div>
				</div>
                <div class="row">
					<div class="col-md-4 text-left">Jenis Kelamin</div>
					<div class="col-md-8 text-left">: <?php echo ($profil['jenis_kelamin'] == 'L')?'Laki-laki':'Perempuan'; ?></div>
				</div>
                <div class="row">
					<div class="col-md-4 text-left">Nomor Handphone</div>
					<div class="col-md-8 text-left">: <?php echo $profil['no_handphone']; ?></div>
				</div>
				<br/>
				<a href="edit_profil.php" class="btn btn-default">Edit</a>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
