<?php
	include 'db.php';

	if (isset($_GET['idk'])) {
		$delete = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '".$_GET['idk']."'");
		echo '<script>window.location="produk.php"</script>';
	}
?>