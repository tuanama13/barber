<?php
	include"header.php";
	include 'navbar.php';
?>



	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	        <img src="assets/img/img-1.jpeg" style="object-fit: cover;" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="assets/img/img-2.jpeg" style="object-fit: cover;" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="assets/img/img-3.jpeg" style="object-fit: cover;" class="d-block w-100" alt="...">
	    </div>
	  </div>
	</div>

	<div class="container">
	  <!-- Content here -->
	   <h2 style="margin-top: 10px;">Botanical Barber</h2>

	   <div class="row justify-content-md-center" style="margin-top: 10px;">
	   	<!-- <div class="col btn-menu">
	   		<button type="button btn-img" onclick="window.location.href='bayar.php'" class="btn btn-light btn-lg shadow-sm p-3 mb-5 bg-white rounded" style="margin-left: 1px;"><img src="assets/img/menu-1.png" height="50px" width="70px" alt="kasir"><br>Bayar</button>
		    <button type="button" class="btn btn-light btn-lg shadow-sm p-3 mb-5 bg-white rounded"><img src="assets/img/menu-2.png" height="50px" width="60px" alt="pendapatan"><br><span style="font-size: 12px;">Pendapatan</span></button>
		    <button type="button" class="btn btn-light btn-lg shadow-sm p-3 mb-5 bg-white rounded"><img src="assets/img/menu-3.png" height="50px" width="60px" alt="pengeluaran"><br><span style="font-size: 12px;">Pengeluaran</span></button>
	   	</div> -->
	   	<div class="col-4">
	   		<button type="button" onclick="window.location.href='bayar.php'" class="btn btn-light btn-lg btn-block shadow-sm p-3 mb-5 bg-white rounded btn-img " style="margin-left: 1px;"><img src="assets/img/menu-1.png" height="50px" width="70px" alt="kasir"><br>Bayar</button>
	   	</div>
	   	<div class="col-4">
	   		<button type="button" onclick="window.location.href='pendapatan.php'" class="btn btn-light btn-lg btn-block shadow-sm p-3 mb-5 bg-white rounded"><img src="assets/img/menu-2.png" height="50px" width="60px" alt="pendapatan"><br><span class="menu-text">Income</span></button>
	   	</div>
	   	<div class="col-4">
	   		<button type="button" onclick="window.location.href='pengeluaran.php'" class="btn btn-light btn-lg btn-block shadow-sm p-3 mb-5 bg-white rounded"><img src="assets/img/menu-3.png" height="50px" width="60px" alt="pengeluaran"><br><span class="menu-text">Outcome</span></button>
	   	</div>
	   </div>

	    
	</div>

   
<?php
	include"footer.php";
?>