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
	
	function rupiah($angka){
	
		$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
		return $hasil_rupiah;
 
	}

	function bulan($angka)
	{
		$bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

		return $bulan[$angka];
	}

	function harian()
	{
		$hari_ini = date("Y-m-d");
		include 'init/db.php';
		$sql = "SELECT SUM(total) as Total FROM transaksi WHERE DATE(tgl_transaksi) = '$hari_ini'";
	    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    // $idmax=$row['maxid'];
	    $total = $row['Total'];

	    return $total;
	}

	function bulanan($tahun_ini, $bulan_ini)
	{
		// $tahun_ini = date("Y");
		// $bulan_ini = date("m");
		include 'init/db.php';
		$sql = "SELECT SUM(total) as Total FROM transaksi WHERE YEAR(tgl_transaksi)='$tahun_ini' AND MONTH(tgl_transaksi) = '$bulan_ini'";
	    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    // $idmax=$row['maxid'];
	    $total = $row['Total'];

	    return $total;
	}