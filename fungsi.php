<?php


	function noTrans()
	{
		include 'init/db.php';
		$sql = "SELECT max(id_transaksi) as maxid FROM transaksi WHERE id_transaksi LIKE 'TRK%'";
	    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    $idmax=$row['maxid'];
	    $row = mysqli_num_rows(mysqli_query($conn,$sql));
	    if ($row<=0) {
	            $id_brg_new="TRK-0000001";
	        }else{
	            $nourut = (int) substr($idmax, 4,7);
	            $nourut++;
	            $id_brg_new = "TRK-".sprintf("%07s", $nourut);
	        }

	    return $id_brg_new;
	}
	// if (isset($_POST['submit'])) {
		
	// }