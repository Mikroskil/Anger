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
            <h1>EDIT PROFIL</h1>
            <section>
                <form action="edit.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-4">Nama</label>
						<div class="col-sm-8"><input type="text" name="nama" class="form-control" value="<?php echo $profil['nama']; ?>"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Tempat Lahir</label>
						<div class="col-sm-8"><input type="text" name="tempat" class="form-control" value="<?php echo $profil['tempat_lahir']; ?>"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Tanggal Lahir</label>
						<div class="col-sm-8"><input type="date" name="tanggal" class="form-control" value="<?php echo $profil['tanggal_lahir']; ?>"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Nama Sekolah</label>
						<div class="col-sm-8"><input type="text" name="sekolah" class="form-control" value="<?php echo $profil['nama_sekolah']; ?>"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Jenis Kelamin</label>
						<div class="col-sm-8">
							<select class="form-control" name="jk">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">No. Handphone</label>
						<div class="col-sm-8"><input type="text" name="hp" class="form-control" value="<?php echo $profil['no_handphone']; ?>"></div>
					</div>
					<br/>
					<button type="submit" class="btn btn-primary">Edit</button>
				</form>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
