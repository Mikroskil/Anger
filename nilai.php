<?php
require_once __DIR__.'/function/jawaban.php';
require_once __DIR__.'/function/library.php';

if (isset($_POST['nilai'])) {
    koreksiNilaiIsian($_POST['nilai'], $_GET['siswa'], $_POST['latihan']);
}

$username = getUsername();
$role = getRole($username);
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
            <?php if ($role == 'siswa' || isset($_GET['siswa'])): ?>
                <?php if (isset($_GET['siswa'])): ?>
                    <?php $username = $_GET['siswa']; ?>
                <?php endif; ?>
                <?php $jawabanPilganArray = findJawabanPilihanGanda($username); ?>
                <?php $jawabanIsianArray = findJawabanIsian($username); ?>
                <section>
                    <p>Pilihan Ganda</p>
                    <?php foreach ($jawabanPilganArray as $jawaban): ?>
                    <div class="row">
                        <div class="col-md-8"><?php echo $jawaban['judul']; ?></div>
                        <?php $nilai = round($jawaban['benar'] * 100.0 / $jawaban['total']); ?>
                        <div class="text-right"><?php echo $nilai; ?></div>
                    </div>
                    <?php endforeach; ?>
                    <p>Isian</p>
                    <?php foreach ($jawabanIsianArray as $jawaban): ?>
                    <div class="row">
                        <div class="col-md-8"><?php echo $jawaban['judul']; ?></div>
                        <div class="text-right">
                            <?php if ($role == 'siswa'): ?>
                                <?php echo (is_null($jawaban['poin'])) ? 'Nilai sedang diproses' : $jawaban['poin']; ?>
                            <?php else: ?>
                                <?php if (is_null($jawaban['poin'])): ?>
                                    <a href="uploads/<?php echo $jawaban['jawaban']; ?>">Jawaban</a>
                                    <form action="nilai.php?siswa=<?php echo $_GET['siswa']; ?>" method="post">
                                        <input type="number" name="nilai">
                                        <input type="hidden" name="latihan" value="<?php echo $jawaban['id_latihan']; ?>">
                                        <button type="submit" class="btn">Koreksi</button>
                                    </form>
                                <?php else: ?>
                                    <?php echo $jawaban['poin']; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </section>
            <?php else: ?>
                <?php $sekolah = getSekolah($username); ?>
                <?php $daftarSiswa = findSiswaPerSekolah($sekolah); ?>
                <section>
                    <?php foreach ($daftarSiswa as $siswa): ?>
                        <p><a href="?siswa=<?php echo $siswa['username']; ?>"><?php echo $siswa['nama']; ?></a></p>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
