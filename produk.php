
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
			<h5>Data Produk</h5>
			<table border="1" cellspacing="0" class="table">
				<thead>
					<tr>
						<th width="60px">ID</th>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Status</th>
						<th>Deskripsi</th>
						<th>Jenis Produk</th>
						<th width="100px">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						$produk = mysqli_query($conn, "SELECT produk.*, jenis_produk.* FROM produk INNER JOIN jenis_produk ON produk.jenis_id = jenis_produk.id_jenis ORDER BY id_produk DESC");
						if(mysqli_num_rows($produk) > 0){
						while($row = mysqli_fetch_array($produk)){
					?>
					<tr>
							
						
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['nama_produk'] ?></td>
						<td><?php echo $row['harga_produk'] ?></td>
						<td><?php if ($row['status_produk'] == 1){
							echo "Ada";
						}else{
							echo "Habis";
						} ?></td>
						<td><?php echo $row['deskripsi'] ?></td>
						<td><?php echo $row['nama_jenis'] ?></td>
						<td>
							<a href="edit-produk.php?idk=<?php echo $row['id_produk'] ?>">
								<input type="submit" name="submit" value="Edit" class="btm-produk">
							</a>
							<a href="hapus-produk.php?idk=<?php echo $row['id_produk'] ?>" onclick="return confirm ('Pastikan Data yang di Hapus Sudah Benar')">
								<input type="submit" name="submit" value="Del" class="btm-produk">
							</a>
						</td>
					</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="8">Tidak Ada Data Produk</td>
						</tr>
					}
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="box2">
			<h5>Tambah Produk Baru</h5>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="nama" placeholder="Nama Produk" class="input-profil" required>

					<input type="text" name="harga" placeholder="Harga Produk" class="input-profil" required>

					<select name="Status" class="input-profil">
						<option>- - Status - -</option>
						<option value="0">Habis</option>
						<option value="1">Ada</option>
					</select>

					<textarea type="text" name="deskripsi" placeholder="Deskripsi Produk" class="input-profil" required></textarea>

					
					<select name="jenis" class="input-profil" required>
						<option>- - Jenis - -</option>
						<?php 
							$jenis = mysqli_query($conn, "SELECT * FROM jenis_produk ORDER BY id_jenis DESC");
							while ($r = mysqli_fetch_array($jenis)) {
							?>
							<option value="<?php echo $r['id_jenis'] ?>"><?php echo $r['nama_jenis'] ?></option>
						<?php } ?>
					</select>

					<input type="submit" name="submit" value="Tambah" class="btm-profil">
				</form>
				<?php 
					if (isset($_POST['submit'])) {
						$jenis = $_POST['jenis'];
						$nama = $_POST['nama'];
						$harga = $_POST['harga'];
						$Status = $_POST['Status'];
						$deskripsi = $_POST['deskripsi'];

						$insert = mysqli_query($conn, "INSERT INTO produk VALUES (
							null,
							'".$jenis."',
							'".$nama."',
							'".$harga."',
							'".$Status."',
							'".$deskripsi."'
						)");
						if ($insert) {
							echo '<script>alert("Ubah Data Berhasil")</script>';
							echo '<script>window.location="produk.php"</script>';
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