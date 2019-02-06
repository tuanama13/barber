<?php
	// session_start();
	// include '../tes.php';
	// include '../init/db.php';
	// require '../functions.php';
	// $sql="";
	$kode = isset( $_GET['kasir']) ?  $_GET['kasir'] : null;

		if (!empty($kode)) {
			if ($kode == "dewasa1") {
				echo '35000';
			}elseif ($kode == "dewasa2") {
				echo '30000';
			}elseif ($kode == "remaja") {
				echo '20000';
			}elseif ($kode == "anak") {
				echo '15000';
			}elseif($kode == "pil"){
				echo '0';
			}
		}else{
			header("Location: bayar.php");
		}

?>