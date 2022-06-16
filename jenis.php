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
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="jenis.php">Jenis Produk</a></li>
				<li><a href="login-user.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="content">
		<div class="box">
			<h5>Jenis Menu</h5>
			<table border="1" cellspacing="0" class="table">
				<thead>
					<tr>
						<th width="60px">ID</th>
						<th>JENIS</th>
						<th width="100px">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						$jenis = mysqli_query($conn, "SELECT * FROM jenis_produk ORDER BY id_jenis DESC");
						while($row = mysqli_fetch_array($jenis)){
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td>
							<?php echo $row['nama_jenis'] ?>
						</td>
						<td>
							<a href="delete-jenis.php?idk=<?php echo $row['id_jenis'] ?>" onclick="return confirm ('Pastikan Data yang di Hapus Sudah Benar')">
								<input type="submit" name="submit" value="Hapus" class="btm-hapus">
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="box2">
			<h5>Tambah Jenis Menu</h5>
				<form action="" method="POST">
					<input type="text" name="jenis" placeholder="Nama Jenis" class="input-profil" required>

					<input type="submit" name="submit" value="Tambah" class="btm-profil">
				</form>
				<?php 
					if (isset($_POST['submit'])) {

						$jenis = ucwords($_POST['jenis']);
						$insert = mysqli_query($conn, "INSERT INTO jenis_produk VALUES (null, '".$jenis."') ");
						
						if ($insert) {
							echo '<script>alert("Ubah Data Berhasil")</script>';
							echo '<script>window.location="jenis.php"</script>';
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