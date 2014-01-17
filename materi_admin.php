<?php
require_once __DIR__.'/function/materi.php';
require_once __DIR__.'/function/library.php';

$username = getUsername();

$kategoriArray = getKategori();
if ($_GET['action'] == 'edit'){
    $materi = findOneMateri($_GET['id']);
    $title = 'Edit Materi';
    $button = 'Edit';
} else {
    $materi = null;
    $title = 'Tambah Materi';
    $button = 'Tambah';
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
            <h1><?php echo $title; ?></h1>
            <section>
                <form action="function/materi/index.php?action=<?php echo isset($_GET['id'])?'edit':'isi'; ?>" class="form-horizontal" role="form" method="post">
                    <?php if (isset($_GET['id'])): ?>
                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Judul</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="judul" value="<?php if(!is_null($materi)) echo $materi['judul']; ?>" /></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori">
                                <?php foreach ($kategoriArray as $kategori): ?>
                                    <option value="<?php echo $kategori['id']; ?>"><?php echo $kategori['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Isi</label>
                        <div class="col-sm-10"><textarea class="form-control" name="isi"><?php if(!is_null($materi)) echo $materi['isi']; ?></textarea></div>
                    </div>
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
