<?php
    include 'init/db.php';
    include 'header.php';
    include 'navbar.php';
    include 'fungsi.php';

    if (isset($_POST['submit'])) {
        // fungsi untuk menghasilkan id autonumber
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
        // tutup fungsi autonumber
        // $id=rand();
        $kategori = mysqli_real_escape_string($conn,$_POST['kategori']);
        $total = mysqli_real_escape_string($conn,$_POST['total']);
        // $del = 0;
        $insert = "INSERT INTO transaksi(id_transaksi,id_kategori,total) VALUES ('$id_brg_new','$kategori','$total')";
        if (mysqli_query($conn,$insert)) {
                header('Location: index.php');
            }else{
                echo '<h4>Query bermasalah</h4>';
            }
    }

?>
    <div class="container">
	
    <h1>Pembayaran</h1>
    <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row">
                <div class="col-6">
                    <h4>No. Transaksi</h4>
                    <h2><?php echo "#".noTrans(); ?></h2>
    
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
                            <?php
                                $sql = "SELECT * FROM kategori";
                                $run_sql = mysqli_query($conn,$sql);
                                $row_cnt = mysqli_num_rows($run_sql);
                                      
                                while($rows = mysqli_fetch_assoc($run_sql)){
                                    echo "<option value='".$rows['id_kategori']."'>".$rows['nama']."</option>";
                                }
                            ?>
                            <!-- <option value="pil" >-- Pilih Service --</option>                    
                            <option value="dws1" >Dewasa Full Service</option>
                            <option value="dws2" >Dewasa</option>
                            <option value="rmj" >Remaja</option>
                            <option value="ank" >Anak-anak</option> -->
                        </select>
                    </div>
                    <div class="form-group">                        
                        <input name="total" id="total" type="number" placeholder="0" class="form-control" readonly>
                    </div>
                    <div class="text-center">
                        <button name="submit" id="btnBayar" type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-md"></i> Bayar</button>
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
              document.getElementById('total').value = result;
              }
            });
          }    
    </script>
<?php
    include"footer.php";
?>