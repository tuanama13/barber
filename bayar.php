<?php
    include"header.php";
    include 'navbar.php';
?>
    <div class="container">
	
    <h1>Pembayaran</h1>
    <br>
        <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <h4>No. Transaksi</h4>
                    <h2> #INV20190100005</h2>
    
                </div>
                <div class="col-6">
                    <?php
                        $tgl = date("d M Y");
                        echo "<h2 class='float-right'>".$tgl."</h2>";
                    ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <div class="form-group"> 
                        <label for="name">Service </label>
                    </div>
                    <div class="form-group"> 
                        <label for="name">Total</label>
                    </div>
                </div>
                <div class="col-9">
                    
                     <div class="form-group">                
                        <select name="kategori" id="kategori" onchange="cek()">
                            <option value="pil" >-- Pilih Service --</option>                    
                            <option value="dewasa1" >Dewasa Full Service</option>
                            <option value="dewasa2" >Dewasa</option>
                            <option value="remaja" >Remaja</option>
                            <option value="anak" >Anak-anak</option>
                        </select>
                    </div>
                    <div class="form-group">                        
                        <input name="Total" id="name" type="number" placeholder="0" class="form-control" readonly>
                    </div>
                    <div class="text-center">
                        <button name="bayar" class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-md"></i> Bayar</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    <script>
        function cek() {
            var kasir = $("#kategori").val();
            // var kasir = $(this).children("option:selected").val();

            // console.log(kasir);

            $.ajax({
              type  : "GET",
              data  : "kasir="+kasir,
              url   : "harga.php",
              success : function(result){
              // console.log(result);
              document.getElementById('name').value = result;
              }
            });
          }    
    </script>
<?php
    include"footer.php";
?>