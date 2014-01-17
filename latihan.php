<?php
require_once __DIR__.'/function/latihan.php';
require_once __DIR__.'/function/library.php';
require_once __DIR__.'/function/jawaban.php';

$tipeArray = getTipeLatihan();
$username = getUsername();
$role = getRole($username);
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
            <?php if (!isset($_GET['id'])): ?>
                <h1>Latihan</h1>
                <section>
                    <?php if ($role == 'guru'): ?>
                        <a href="latihan_admin.php?action=isi" class="btn btn-default" role="button">Tambah Latihan</a>
                    <?php endif; ?>
                    <?php foreach ($tipeArray as $tipe): ?>
                        <p><?php echo $tipe['tipe']; ?></p>
                        <?php $latihanArray = findLatihanByTipe($tipe['id']); ?>
                        <?php foreach ($latihanArray as $latihan): ?>
                            <div class="row">
                                <div class="col-md-8"><a href="?id=<?php echo $latihan['id'] ?>"><?php echo $latihan['judul']; ?></a></div>
                                <?php if ($role == 'guru'): ?>
                                    <div class="col-md-1 col-md-offset-3">
                                        <a href="latihan_admin.php?action=edit&tipe=<?php echo $tipe['tipe']; ?>&id=<?php echo $latihan['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="function/latihan/nonaktif.php?id=<?php echo $latihan['id']; ?>"><span class="glyphicon glyphicon-flag"></span></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </section>
            <?php else: ?>
                <?php $latihan = findOneLatihan($_GET['id']); ?>
                <h1><?php echo $latihan['judul']; ?></h1>
                <?php $tipe = findTipe($latihan['id_tipe']); ?>
                <?php $cek = isPernahLatihan($username, $_GET['id'], $tipe['tipe']); ?>
                <?php if (!$cek): ?>
                    <form action="function/latihan/jawaban.php" method="post" enctype="multipart/form-data">
                        <?php $soalArray = findSoalByLatihan($latihan['id'], $tipe['tipe']); ?>
                        <input type="hidden" value="<?php echo $tipe['tipe']; ?>" name="tipe">
                        <input type="hidden" value="<?php echo $latihan['id']; ?>" name="latihan">
                        <?php if (count($soalArray) > 0): ?>
                            <section class="text-left">
                                <?php foreach ($soalArray as $key => $soal): ?>
                                    <p><?php echo ($key+1).'. '.$soal['soal']; ?></p>
                                    <?php if ($tipe['tipe'] == "Pilihan Ganda"): ?>
                                        <ul class="list-inline row pilihan">
                                            <?php if ($role == 'siswa'): ?>
                                                <li class="col-md-2"><input type="radio" name="jawaban[<?php echo $key; ?>]" value="A" /><?php echo $soal['pilihan_1']; ?></li>
                                                <li class="col-md-2"><input type="radio" name="jawaban[<?php echo $key; ?>]" value="B" /><?php echo $soal['pilihan_2']; ?></li>
                                                <li class="col-md-2"><input type="radio" name="jawaban[<?php echo $key; ?>]" value="C" /><?php echo $soal['pilihan_3']; ?></li>
                                                <li class="col-md-2"><input type="radio" name="jawaban[<?php echo $key; ?>]" value="D" /><?php echo $soal['pilihan_4']; ?></li>
                                                <li class="col-md-2"><input type="radio" name="jawaban[<?php echo $key; ?>]" value="E" /><?php echo $soal['pilihan_5']; ?></li>
                                            <?php else: ?>
                                                <li class="col-md-2">A. <?php echo $soal['pilihan_1']; ?></li>
                                                <li class="col-md-2">B. <?php echo $soal['pilihan_2']; ?></li>
                                                <li class="col-md-2">C. <?php echo $soal['pilihan_3']; ?></li>
                                                <li class="col-md-2">D. <?php echo $soal['pilihan_4']; ?></li>
                                                <li class="col-md-2">E. <?php echo $soal['pilihan_5']; ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($tipe['tipe'] == "Isian"): ?>
                                    <p>Jawaban : <input type="file" name="jawaban" /></p>
                                <?php endif; ?>
                            </section>
                            <?php if ($role == 'siswa'): ?>
                                <input type="submit" class="btn btn-primary" value="Kumpul" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </form>
                <?php else: ?>
                    <p class="alert alert-info text-center">Anda sudah mengambil latihan ini.</p>
                <?php endif; ?>
            <?php endif; ?>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
