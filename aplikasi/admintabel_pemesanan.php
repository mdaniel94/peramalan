 <?php
if(!isset($_SESSION)) {
     session_start();

include "../login/connect.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<title>Tabel Pemesanan</title>
	<head>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    
    <link href="build/css/custom.min.css" rel="stylesheet">
    
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    
    </head>
    <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include("menu.php");?>
        <!-- top navigation -->
        <?php include("topmenu.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
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
                    <h2>Tabel Pemesanan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
					             TABEL DATA PEMESANAN</a>
                        <li role="presentation"><a href="#tab_content1" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="true">TABEL DATA PEMESANAN </a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                          <table class="table table-striped table-bordered" id="datatable" >
						<thead>
							<tr align="center">
                                <th>NO</th>
								                <th>ID PELANGGAN</th>
								                <th>NAMA PELANGGAN</th>
                                <th>NO KTP</th>
                                <th>ALAMAT TINGGAL</th>
                                <th>NO TELEPON</th>
								                <th>PEKERJAAN</th>
                                <th>PENDAPATAN</th>
                                <th>ACTION</th>
    						
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
						$no = 1;
						$pel =mysql_query("SELECT * FROM `tb_pelanggan` ORDER BY `tb_pelanggan`.`id_pelanggan` ASC");
						
						while ($baris = mysql_fetch_array($pel)){
						
						echo"
							<td>$no</td>
							<td>$baris[id_pelanggan]</td>
							<td>$baris[nama]</td>
							<td>$baris[no_ktp]</td>
							<td>$baris[alamat_tinggal]</td>
							<td>$baris[no_telepon]</td>
							<td>$baris[pekerjaan]</td>
							<td>$baris[pendapatan]</td>
							"?>
                            <td><a href=adminubah_pelanggan.php?id_pelanggan=<?php echo $baris['id_pelanggan']?>            
                <li>
                  <span class="glyphicon glyphicon-wrench"></span>
                  <span class="glyphicon-class">Setting</span>
                </li>
                            		</a>
                                    <br>
                                    <a href=hapus_pelanggan.php?id_pelanggan=<?php echo $baris['id_pelanggan']?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"           
                <li>
                  <span class="glyphicon glyphicon-trash"></span>
                  <span class="glyphicon-class">Hapus</span>
                </li>
                            </td>
                            </tr>
<?php $no++; } ?>
					</tbody>

					</table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="profile-tab">
                          <table class="table table-striped table-bordered" id="datatable0" >
						<thead>
							<tr align="center">
                                <th>NO</th>
								                <th>ID PEMESANAN</th>
								                <th>NAMA PELANGGAN</th>
                                <th>ALAMAT PELANGGAN</th>
                                <th>MOBIL PESANAN</th>
								                <th>TANGGAL PEMESANAN</th>
                                <th>ACTION</th>
    						
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
						include "../login/connect.php"; //sambungkan ke database
						$no = 1;
						$hasil=mysql_query("SELECT * FROM `tb_pemesanan` ORDER BY `tb_pemesanan`.`tanggal_pemesanan` ASC ");
						while ($baris = mysql_fetch_array($hasil)){
						
						echo"
							<td>$no</td>
							<td>$baris[id_pemesanan]</td>";
							$pel = mysql_query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$baris[id_pelanggan]'");
$pelanggan = mysql_fetch_array($pel);
echo "<td>$pelanggan[nama]</td>";
echo "<td>$pelanggan[alamat_tinggal]</td>";
							$mob = mysql_query("SELECT jenis_tipe FROM tb_mobil WHERE id_mobil = '$baris[id_mobil]'");
$mobil = mysql_fetch_array($mob);
echo "<td>$mobil[jenis_tipe]</td>";

						echo"	
							<td>$baris[tanggal_pemesanan]</td>
							"?>
                            <td><a href=adminubah_pemesanan.php?id_pemesanan=<?php echo $baris['id_pemesanan']?>            
                <li>
                  <span class="glyphicon glyphicon-wrench"></span>
                  <span class="glyphicon-class">Setting</span>
                </li>
                            		</a>
                                    <br>
                                    <a href=hapus_pemesanan.php?id+pemesanan=<?php echo $baris['id_pelanggan']?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"           
                <li>
                  <span class="glyphicon glyphicon-trash"></span>
                  <span class="glyphicon-class">Hapus</span>
                </li>
                            		</a>
                            </td>
                            </tr>
<?php $no++; } ?>
					</tbody>

					</table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        
		$('#datatable').dataTable();
		$('#datatable0').dataTable();
      });
    </script>
    </html>

          <?php
}
  ?>