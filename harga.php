<?php
	include 'init/db.php';
	
	$kode = isset( $_GET['kasir']) ?  $_GET['kasir'] : null;

		if (!empty($kode)) {
			if ($kode == "pil") {
				echo '0';
			}else{
				$sql = "SELECT * FROM kategori WHERE id_kategori = '$kode'";
	            $run_sql = mysqli_query($conn,$sql);
	            // $row_cnt = mysqli_num_rows($run_sql);
	            $rows = mysqli_fetch_assoc($run_sql);
	            $harga = $rows['harga'];
	            echo $harga;
			}
		}else{
			header("Location: bayar.php");
		}

?>