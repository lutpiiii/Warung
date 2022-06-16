<?<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
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
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="jenis.php">jenis Produk</a></li>
				<li><a href="login-user.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="selection">
		<div class="content">
		<h3>Profil</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-profil" value="<?php echo $d->nama_pegawai ?>" required><br>
					<input type="text" name="password" placeholder="Password" class="input-profil" value="<?php echo $d->pass_pegawai ?>" required><br>
					<input type="text" name="noTelp" placeholder="No Telp" class="input-profil" value="<?php echo $d->notelp_pegawai ?>" required><br>
					<input type="submit" name="submit" value="Ubah Profil" class="btm-profil">
				</form>
				<?php 
					if (isset($_POST['submit'])) {

						$nama = ucwords($_POST['nama']);
						$pass = $_POST['password'];
						$notelp = $_POST['noTelp'];

						$update = mysqli_query($conn, "UPDATE pegawai set 
							nama_pegawai = '".$nama."', 
							pass_pegawai = '".$pass."', 
							notelp_pegawai = '".$notelp."'
							WHERE id_pegawai = '".$d->id_pegawai."'
							");
						if ($update) {
							echo '<script>alert("Ubah Data Berhasil")</script>';
							echo '<script>window.location="profil.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($conn);
						}
					}
				?>
			</div>
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