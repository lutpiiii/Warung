<?<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	$getId = $_GET['idk'];

	$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '".$getId."'");
	$d = mysqli_fetch_array($query);

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
		<h3>Edit Produk</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Produk" class="input-profil" value="<?=$d['nama_produk'] ?>" required>
					<input type="text" name="harga" placeholder="Harga Produk" class="input-profil" value="<?=$d['harga_produk'] ?>" required>
					<select name="status" class="input-profil"required>
						<option>- - Status - -</option>
						<option value="0">Habis</option>
						<option value="1">Ada</option>
					</select>
					
					<textarea type="text" name="deskripsi" placeholder="Deskripsi Produk" class="input-profil" required><?php echo $d['deskripsi'] ?></textarea>

					<select name="jenis" class="input-profil" required>
						<option>- - Jenis - -</option>
						<?php 
							$jenis = mysqli_query($conn, "SELECT * FROM jenis_produk ORDER BY id_jenis DESC");
							while ($r = mysqli_fetch_array($jenis)) {
							?>
							<option value="<?php echo $r['id_jenis'] ?>"><?php echo $r['nama_jenis'] ?></option>
						<?php } ?>
					</select>

					<input type="submit" name="submit" value="Ubah Profil" class="btm-profil">
				</form>
				<?php 
					if (isset($_POST['submit'])) {

						$nama = ucwords($_POST['nama']);
						$harga = $_POST['harga'];
						$status = $_POST['status'];
						$deskripsi = $_POST['deskripsi'];
						$jenis = $_POST['jenis'];

						$update = mysqli_query($conn, "UPDATE produk set 
							nama_produk = '".$nama."', 
							harga_produk = '".$harga."', 
							status_produk = '".$status."',
							deskripsi = '".$deskripsi."',
							jenis_id = '".$jenis."'
							WHERE id_produk = '".$getId."'
							");
						if ($update) {
							echo '<script>alert("Ubah Data Berhasil")</script>';
							echo '<script>window.location="produk.php"</script>';
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