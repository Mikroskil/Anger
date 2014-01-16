<?php
require_once __DIR__.'/function/session.php';

session_start();
if (hasSession('username')) {
	header('Location: home.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once "title.php";?>
</head>
<body>
    <div id="container">
        <article id="content" class="layer">
            <h1>REGISTER</h1>
			<?php if (hasSession('error')): ?>
				<p class="alert alert-danger"><?php echo getSession('error'); ?></p>
				<?php unset($_SESSION['error']); ?>
			<?php endif; ?>
            <section>
                <form action="daftar.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-4">Nama</label>
						<div class="col-sm-8"><input type="text" name="nama" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Username</label>
						<div class="col-sm-8"><input type="text" name="user" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Password</label>
						<div class="col-sm-8"><input type="password" name="pass" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Status</label>
						<div class="col-sm-8">
							<select class="form-control" name="status">
								<option value="1">Siswa</option>
								<option value="2">Guru</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Tempat Lahir</label>
						<div class="col-sm-8"><input type="text" name="tempat" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Tanggal Lahir</label>
						<div class="col-sm-8"><input type="date" name="tanggal" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Nama Sekolah</label>
						<div class="col-sm-8"><input type="text" name="sekolah" class="form-control"></div>
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
						<div class="col-sm-8"><input type="text" name="hp" class="form-control"></div>
					</div>
					<br/>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
				<br/>
				<a href="index.php" class="btn btn-default">Login</a>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
