<?php
require_once __DIR__.'/function/materi.php';
require_once __DIR__.'/function/library.php';

$kategoriArray = getKategori();
$username = getUsername();
$role = getRole($username);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once "title.php"; ?>
</head>
<body>
    <div id="container">
        <?php include_once "header.php";?>
        <article id="content" class="layer">
            <?php if (!isset($_GET['id'])): ?>
                <h1>Materi Pembelajaran</h1>
                <section>
                    <?php if ($role == 'guru'): ?>
                        <a href="materi_admin.php?action=isi" class="btn btn-default" role="button">Tambah Materi</a>
                    <?php endif; ?>
                    <?php foreach ($kategoriArray as $kategori): ?>
                        <p><?php echo $kategori['nama']; ?></p>
                        <?php $materiArray = findMateriByKategori($kategori['id']); ?>
                        <?php foreach ($materiArray as $materi): ?>
                            <div class="row">
                                <div class="col-md-8"><a href="?id=<?php echo $materi['id'] ?>"><?php echo $materi['judul']; ?></a></div>
                                <?php if ($role == 'guru'): ?>
                                    <div class="col-md-1 col-md-offset-3">
                                        <a href="materi_admin.php?action=edit&id=<?php echo $materi['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="function/materi/delete.php?id=<?php echo $materi['id'] ?>"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </section>
            <?php else: ?>
                <?php $materi = findOneMateri($_GET['id']); ?>
                <h1><?php echo $materi['judul']; ?></h1>
                <section>
                    <p><?php echo $materi['isi']; ?></p>
                </section>
            <?php endif; ?>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
