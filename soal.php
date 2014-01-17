<?php
require_once __DIR__.'/function/latihan.php';
require_once __DIR__.'/function/library.php';

if ($_GET['action'] == 'edit'){
    $soal = findOneSoal($_GET['id'], $_GET['tipe']);
    $title = 'Edit Soal';
    $button = 'Edit';
} else {
    $soal = null;
    $title = 'Tambah Soal';
    $button = 'Tambah';
}
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
            <h1><?php echo $title; ?></h1>
            <section>
                <form action="function/latihan/soal.php?action=<?php echo isset($_GET['id'])?'edit':'isi'; ?>" class="form-horizontal" role="form" method="post">
                    <?php if (isset($_GET['id'])): ?>
                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
                    <?php endif; ?>
                    <input type="hidden" value="<?php echo $_GET['tipe']; ?>" name="tipe">
                    <input type="hidden" value="<?php echo $_GET['id_latihan']; ?>" name="latihan">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Soal</label>
                        <div class="col-sm-10"><textarea class="form-control" name="soal"><?php if(!is_null($soal)) echo $soal['soal']; ?></textarea></div>
                    </div>
                    <?php if ($_GET['tipe'] == 'Pilihan Ganda'): ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Jawaban</label>
                            <div class="col-sm-1">
                                <select class="form-control" name="jawaban">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan 1</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="pilihan-1" value="<?php if(!is_null($soal)) echo $soal['pilihan_1']; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan 2</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="pilihan-2" value="<?php if(!is_null($soal)) echo $soal['pilihan_2']; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan 3</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="pilihan-3" value="<?php if(!is_null($soal)) echo $soal['pilihan_3']; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan 4</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="pilihan-4" value="<?php if(!is_null($soal)) echo $soal['pilihan_4']; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan 5</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="pilihan-5" value="<?php if(!is_null($soal)) echo $soal['pilihan_5']; ?>" /></div>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button>
                </form>
            </section>
        </article>
        <footer>
            <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
