
<?<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WaroengQ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<!-- header -->
<body>
	<header>
		<div class="header">
			<h1>WaroengQ</h1>
		</div>
	</header>

	<!-- content -->
	<div class="selection">
		<h5>Tambah User Baru</h5>
		<div class="box2">
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="nama_user" placeholder="Nama User" class="input-profil" required>

					<input type="text" name="pass_user" placeholder="Password User" class="input-profil" required>

					<input type="text" name="notelp_user" placeholder="No Telp User" class="input-profil" required>

					<input type="text" name="alamat_user" placeholder="Alamat user" class="input-profil" required>
					
					<input type="submit" name="submit" value="registrasi" class="btm-profil">

				</form>
				<?php 
					if (isset($_POST['submit'])) {
						$nama = $_POST['nama_user'];
						$pass = $_POST['pass_user'];
						$notelp = $_POST['notelp_user'];
						$alamat = $_POST['alamat_user'];

						$insert = mysqli_query($conn, "INSERT INTO user VALUES (
							null,
							'".$nama."',
							'".$pass."',
							'".$notelp."',
							'".$alamat."'
						)");
						if ($insert) {
							echo '<script>window.location="login-user.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($conn);
						}
						
					}
				?>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - WaroengQ</small>
		</div>
	</footer>
</body>
</html>