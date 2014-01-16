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
            <h1>LOGIN</h1>
			<?php if (hasSession('error')): ?>
				<p class="alert alert-danger"><?php echo getSession('error'); ?></p>
				<?php unset($_SESSION['error']); ?>
			<?php endif; ?>
            <section>
                <form action="login.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-1">Username</label>
						<div class="col-sm-4"><input type="text" name="user" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-1">Password</label>
						<div class="col-sm-4"><input type="password" name="pass" class="form-control"></div>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
				<br/>
				<a href="register.php" class="btn btn-default">Register</a>
            </section>
        </article>
        <footer>
      	    <div>&copy; Copyright 2013</div>
        </footer>
    </div>
</body>
</html>
