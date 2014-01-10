<?php
require_once __DIR__.'/function/latihan.php';

$tipeArray = getTipeLatihan();
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
                    <?php foreach ($tipeArray as $tipe): ?>
                        <p><?php echo $tipe['tipe']; ?></p>
                        <?php $latihanArray = findLatihanByTipe($tipe['id']); ?>
                        <?php foreach ($latihanArray as $latihan): ?>
                            <p><a href="?id=<?php echo $latihan['id'] ?>"><?php echo $latihan['judul']; ?></a></p>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </section>
            <?php else: ?>
                <form action="function/latihan/jawaban.php" method="post">
                    <?php $latihan = findOneLatihan($_GET['id']); ?>
                    <h1><?php echo $latihan['judul']; ?></h1>
                    <?php $tipe = findTipe($latihan['id_tipe']); ?>
                    <?php $soalArray = findSoalByLatihan($latihan['id'], $tipe['tipe']); ?>
                    <input type="hidden" value="<?php echo $tipe['tipe']; ?>" name="tipe">
                    <input type="hidden" value=<?php echo $latihan['id']; ?> name="latihan">
                    <section>
                        <?php foreach ($soalArray as $key => $soal): ?>
                            <p><?php echo ($key+1).'. '.$soal['soal']; ?></p>
                            <?php if ($tipe['tipe'] == "Pilihan Ganda"): ?>
                                <ul>
                                    <li><input type="radio" name="jawaban[<?php echo $key; ?>]" value="A" /><?php echo $soal['pilihan_1']; ?></li>
                                    <li><input type="radio" name="jawaban[<?php echo $key; ?>]" value="B" /><?php echo $soal['pilihan_2']; ?></li>
                                    <li><input type="radio" name="jawaban[<?php echo $key; ?>]" value="C" /><?php echo $soal['pilihan_3']; ?></li>
                                    <li><input type="radio" name="jawaban[<?php echo $key; ?>]" value="D" /><?php echo $soal['pilihan_4']; ?></li>
                                    <li><input type="radio" name="jawaban[<?php echo $key; ?>]" value="E" /><?php echo $soal['pilihan_5']; ?></li>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($tipe['tipe'] == "Isian"): ?>
                            <p>Jawaban : <input type="file" name="jawaban" /></p>
                        <?php endif; ?>
                    </section>
                    <input type="submit" value="Kumpul" />
                </form>
            <?php endif; ?>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
