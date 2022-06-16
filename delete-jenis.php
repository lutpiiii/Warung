<?php
	include 'db.php';

	if (isset($_GET['idk'])) {
		$delete = mysqli_query($conn, "DELETE FROM jenis_produk WHERE id_jenis = '".$_GET['idk']."'");
		echo '<script>window.location="jenis.php"</script>';
	}
?>