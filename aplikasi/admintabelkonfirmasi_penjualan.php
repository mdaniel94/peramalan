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
                <h3>Form Pegawai</h3>
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
                    <h2>Tabel Data Mobil & Suplai</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="table table-striped table-bordered" id="datatable" >
            <thead>
              <tr align="center">
                                <th>NO</th>
                                <th>ID PEMESANAN</th>
                                <th>NAMA PELANGGAN</th>
                                <th>ALAMAT PELANGGAN</th>
                                <th>ID Mobil</th>
                                <th>MOBIL PESANAN</th>
                                <th>TANGGAL PEMESANAN</th>
                                <th>ACTION</th>
                
              </tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
            include "../login/connect.php"; //sambungkan ke database
            $no=1;
            $hasil=mysql_query("SELECT * FROM `tb_pemesanan` where verifikasi ='0' ORDER BY `tb_pemesanan`.`tanggal_pemesanan` ASC ");
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
                echo "
                <td>$baris[id_mobil]</td>
                <td>$mobil[jenis_tipe]</td>";

                echo" 
                <td>$baris[tanggal_pemesanan]</td>
              "?>
                            <td><a href=admininput_verifikasi.php?id_pemesanan=<?php echo $baris['id_pemesanan']?>            
                <li>
                  <span class="glyphicon glyphicon-wrench"></span>
                  <span class="glyphicon-class">Input Penjualan</span>
                </li>
                                </a>
                            </td>
                            </tr>
<?php  $no++;} ?>
          </tbody>

          </table>


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
    $('#datatable1').dataTable();
      });
    </script>
    </html>

          <?php
}
  ?>