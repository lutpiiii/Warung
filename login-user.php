<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login | WaroengQ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h6>
			<a href="login.php"><center>Login</center></a>
		</h6>
		<form method="POST">
			<input type="text" name="user" placeholder="username" class="input-control">
			<input type="password" name="pass" placeholder="password" class="input-control">
			<input type="submit" name="submit" value="login" class="btm"><br>
			<a href="registrasi.php" class="btm-reg"><center>Register</center></a>
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				session_start();
				include 'db.php';

				$user = $_POST['user'];
				$pass = $_POST['pass'];

				$cek = mysqli_query($conn, "SELECT * FROM user WHERE nama_user = '".$user."' AND pass_user = '".$pass."'");
				
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->id_user;
					echo '<script>window.location="dashboard-user.php"</script>';
				}else{
					echo '<script>alert("Username atau Password Anda Salah!")</script>';
				}
			}
		?>
	</div>
</body>
</html>