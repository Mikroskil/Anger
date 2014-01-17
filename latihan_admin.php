<?php
require_once __DIR__.'/function/latihan.php';
require_once __DIR__.'/function/library.php';

$username = getUsername();

if ($_GET['action'] == 'edit'){
    $latihan = findOneLatihan($_GET['id']);
    $soalArray = findSoalByLatihan($_GET['id'], $_GET['tipe']);
    $title = 'Edit Latihan';
    $button = 'Edit';
} else {
    $latihan = null;
    $title = 'Tambah Latihan';
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
                <form action="function/latihan/index.php?action=<?php echo isset($_GET['id'])?'edit':'isi'; ?>" class="form-horizontal" role="form" method="post">
                    <?php if (isset($_GET['id'])): ?>
                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Judul</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="judul" value="<?php if(!is_null($latihan)) echo $latihan['judul']; ?>" /></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tipe</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipe">
                                <option value="1">Pilihan Ganda</option>
                                <option value="2">Isian</option>
                            </select>
                        </div>
                    </div>
                    <?php if ($_GET['action'] == 'edit'): ?>
                        <a href="soal.php?action=isi&tipe=<?php echo $_GET['tipe']; ?>&id_latihan=<?php echo $_GET['id']; ?>" class="btn btn-default" role="button">Tambah Soal</a>
                        <?php foreach ($soalArray as $key => $soal): ?>
                            <div class="row">
                                <div class="col-md-1"><?php echo $key + 1; ?></div>
                                <div class="col-md-7 text-left"><a href="soal.php?action=edit&id=<?php echo $soal['id']; ?>&tipe=<?php echo $_GET['tipe']; ?>&id_latihan=<?php echo $_GET['id']; ?>"><?php echo $soal['soal']; ?></a></div>
                                <div class="col-md-1 col-md-offset-3">
                                    <a href="function/latihan/flag_soal.php?id=<?php echo $soal['id']; ?>&tipe=<?php echo $_GET['tipe']; ?>"><span class="glyphicon glyphicon-flag"></span></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
