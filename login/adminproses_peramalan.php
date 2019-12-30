<?php

	include "file:///C|/xampp/htdocs/connect.php";
	
	$query = mysql_query("SELECT DISTINCT unit from tb_mobil");
	$jenis_tipe=$_POST['bulan2'];
	$jenis_tipe=$_POST['bulan2'];
	$jenis_tipe=$_POST['bulan2'];
	
	if($tes % 2 == 0)
                {$hasil=$tes-1;
				$hs=$hasil*-1;
				}else{
				$hasil=$tes-1;
				$hasil2=$hasil/2;
				$hs=$hasil2*-1;
				}
	?>
    
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include("../menu.php");?>
        <!-- top navigation -->
        <?php include("../topmenu.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Input Mobil</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 
                    
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Data Mobil</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div align="center">
                  <?php 
				  if ($tes % 2 == 0){
				  ?>
                    <table class="table table-striped table-bordered" id="datatable" >
						<thead>
							<tr align="center">
                            	<th>NO</th>
								<th>TAHUN</th>
								<th>VARIABEL WAKTU(x)</th>
                                <th>JUMLAH MOBIL TERJUAL(y)</th>
                                <th>Xy</th>
                                <th>XX</th>
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
						$no= 1;
						$hasil=mysql_query("SELECT * FROM tb_mobil INNER JOIN tb_penjualan ON tb_penjualan.id_mobil = tb_mobil.id_mobil WHERE jenis_tipe='Rx12'"); 
						while ($baris = mysql_fetch_array($hasil)){
						echo "
							<td>$no</td>
							<td>$baris[tgl_penjualan]</td>
							<td>$baris[jenis_tipe]</td>
							<td>$baris[warna]</td>
							<td>$baris[tahun_pembuatan]</td>
							
							<td>$baris[tahun_pembuatan]</td>
							" ?>
                            </tr>
<?php $no ++; } ?>
					</tbody>

					</table>
                    <?php } else
					{?>
<table border="2" class="table table-striped table-bordered" id="datatable0" >
						<thead>
							<tr align="center">
                                
								<th>NO</th>
								<th>Year</th>
								<th>Penjualan</th>
								<th>Variabel Tahun</th>
                                <th>X*X</th>
                                <th>X*Y</th>
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
					   $no=1;
					   $ia=-2;
						$hasil=mysql_query("SELECT DISTINCT(year(tgl_penjualan)) as hitung FROM tb_penjualan");
						while ($baris = mysql_fetch_array($hasil)){
						$sa=$ia*$ia;
						echo "
							<td>$no</td>
							<td>$baris[hitung]</td>";
							$pel = mysql_query("SELECT Count(tgl_penjualan) as jumlah FROM tb_penjualan WHERE year(tgl_penjualan)=$baris[hitung]");
							$pelanggan = mysql_fetch_array($pel);
							$sb=$ia*$pelanggan['jumlah'];
							echo 
							"
							<td>$pelanggan[jumlah]</td>";
							echo
							"
							
							<td>$ia</td>";
							echo"
							<td>$sa</td>
							<td>$sb</td>
							" ?>
                            </tr>
<?php $no++;$ia++; } ?>
					</tbody>
					</table>
					<?php } ?>
                   </div>
                 </div>
                </div>
              </div>
            </div>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  <?php

  ?>