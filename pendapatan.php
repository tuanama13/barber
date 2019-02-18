<?php 
include "header.php";
include 'navbar.php';
 ?>

<div class="container">

     <div class="form-group">
        <label for="name">Total pendapatan</label>
        <input name="Total" id="name" type="text" class="form-control">     	 	
     </div>

      <div class="form-group">
        <label for="name">Keterangan</label>
          <textarea class="form-control" rows="5" name="keterangan" id="name"></textarea>        
     </div>

     <div class="form-group">
        <label for="name">Total Pengeluaran</label>
        <input name="pengeluaran" id="name" type="number" class="form-control">             
     </div>



     <div class="text-center">
             <button name="bayar" class="btn btn-primary"><i class="fa fa-user-md"></i> Simpan</button>
         </div> 

  

<?php include 'footer.php'; ?>