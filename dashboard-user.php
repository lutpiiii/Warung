<?<?php 
	session_start();
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
				<li><a href="dashboard-user.php">Dashboard</a></li> 
				<!-- Nampilno produk sng arep di tuku, sisan transaksi, karo munculno detail transaksi, karo munculno informasi barang wes di verifikasi admin ta durung-->
				
				<li><a href="user.php">Profil</a></li>
				<li><a href="login-user.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="content">
		<h3>Dashboard</h3>
		<div class="box">
			<h4>Selamat Datang <?php echo $_SESSION['a_global']->nama_user?></h4>
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