<?php
    include 'init/db.php'; 
    include 'header.php';
    include 'navbar.php';
    include 'fungsi.php';
    $date = date("Y-m-d");
    $date_d = date("d");
    $month = date("m");
    $year = date("Y");
?>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <!-- start col-6 -->
        <div class="col-6">
             <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo rupiah(harian()); ?></h3>

                    <p>Total Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fa fa-chart-line"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>     
            </div>
        </div>
        <!-- end col-6 -->
        <!-- start col-6 -->
        <div class="col-6">
             <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo rupiah(bulanan($year, $month)); ?></h3>

                    <p>Total Bulan <?php echo bulan((int)date("m")) ?> </p>
                </div>
                <div class="icon">
                    <i class="fa fa-money-bill-wave-alt"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>     
            </div>
        </div>
        <!-- end col-6 -->
    </div>  
    <!-- end row     -->
    <!-- start row -->
    <div class="row">
        <div class="col-12">
            <canvas id="myChart" width="100" height="50"></canvas>
        </div>
    </div>
    <!-- end row -->
    <!-- start row -->
    <div class="row">
        <!-- start col -->
        <div class="col-sm-12">
            <table id="pendapatan" class="table table-striped display responsive no-wrap" cellspacing="0" style="width:100%">
                 <thead>
                <tr>
                  <th>tanggal Transaksi</th>
                  <th>Total Transaksi</th>
                  <th>Kategori</th>
                  <th>Id Transaksi</th>
                  <!-- <th colspan="2" style="text-align: center">Action</th> -->
                </tr>
              </thead>
              <tbody>
                
                <?php
                $sql = "SELECT * FROM transaksi JOIN kategori USING(id_kategori) WHERE DATE(tgl_transaksi)='$date'";
                $run_sql = mysqli_query($conn,$sql);
                $numResults_today = mysqli_num_rows($run_sql);
                
                
                // $id = $rows['id_brg'];
                if ($numResults_today <= 0) {
                        echo "
                            <tr>
                                <td colspan='4' align ='center'>Hari Ini Tidak Ada Transaksi</td>
                                <td style='display: none;'></td>
                                <td style='display: none;'></td>
                                <td style='display: none;'></td>
                            </tr>
                        ";
                }else{
                    while($rows = mysqli_fetch_assoc($run_sql)){
                        echo "
                        <tr>                  
                          <td>$rows[tgl_transaksi]</td>
                          <td style='text-align:right'>".rupiah($rows['total'])."</td>
                          <td>$rows[nama]</td>   
                          <td>$rows[id_transaksi]</td>            
                        </tr>
                        ";
                    }
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->



<script type="text/javascript">
$(document).ready(function() {
    $('#pendapatan').DataTable( {
        responsive: {
            details: true
        }
    } );
    // $('#example').DataTable();
});

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php $sql_1 = "SELECT MONTH(tgl_transaksi) AS Bulan_ FROM transaksi WHERE YEAR(tgl_transaksi) = $year GROUP BY MONTH(tgl_transaksi) ASC";
                        $run_sql_1 = mysqli_query($conn,$sql_1); 
                        while($rows_1 = mysqli_fetch_assoc($run_sql_1)){ 
                            echo '"'.bulan($rows_1['Bulan_']).'",';
                        } ?>],
        datasets: [{
            label: 'Pendapatan',
            data: [<?php 
                        $counter_1 = 0; 
                        $sql_1 = "SELECT MONTH(tgl_transaksi) AS Bulan_ FROM transaksi WHERE YEAR(tgl_transaksi) = $year GROUP BY MONTH(tgl_transaksi) ASC";
                        $run_sql_1 = mysqli_query($conn,$sql_1);
                        $numResults_1 = mysqli_num_rows($run_sql_1);
                        while($rows_1 = mysqli_fetch_assoc($run_sql_1)){
                            if (++$counter_1 == $numResults_1) {
                                echo bulanan($year,$rows_1['Bulan_']);
                            } else {
                                echo bulanan($year,$rows_1['Bulan_']).',';
                            }
                        }?>],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>


  

<?php 
    include 'footer.php'; 
?>