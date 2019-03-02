<?php
    include 'init/db.php'; 
    include 'header.php';
    include 'navbar.php';
    include 'fungsi.php';
    $date = date("Y-m-d");
    $date_d = date("d");
    $month = date("m");
    $year = date("Y");


    if (isset($_POST['submit'])) {
        $keterangan = mysqli_real_escape_string($conn,$_POST['keterangan']);
        $total = mysqli_real_escape_string($conn,$_POST['total']);
        // $del = 0;
        $insert = "INSERT INTO pengeluaran(keterangan,jumlah) VALUES ('$keterangan','$total')";
        if (mysqli_query($conn,$insert)) {
                header('Location: index.php');
            }else{
                echo '<h4>Query bermasalah</h4>';
            }
    }

?>
 <div class="container">
    
    <h1>Belanja</h1>
    <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row">
                <div class="col-6">
                    <h4>Kode Pengeluaran</h4>
                    <h2><?php echo "#".noPeng(); ?></h2>
    
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
                        <label for="keterangan">Keterangan </label>
                    </div>
                </div>
                <div class="col-9">
                    
                     <div class="form-group">                
                        <textarea name="keterangan" class="form-control" rows="6" cols="5"></textarea>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group"> 
                        <label for="total">Total</label>
                    </div>
                </div>
                <div class="col-9">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                      </div>
                      <input name="total" id="total" type="number" placeholder="Masukan Total Belanja" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                     <!--  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> -->
                    </div>

                    <div class="text-center">
                        <button name="submit" id="btnBayar" type="submit" class="btn btn-primary btn-lg btn-block">Bayar</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
<?php  
    include 'footer.php'; 
?>