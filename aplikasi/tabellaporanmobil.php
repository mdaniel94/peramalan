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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    
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
                    <h2>Tabel Data Stock Mobil di Gudang</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="table table-striped table-bordered" id="datatable-buttons" >
            <thead>
              <tr align="center">
                                <th>ID MOBIL</th>
                                <th>UNIT</th>
                                <th>TIPE MOBIL</th>
                                <th>WARNA</th>
                                <th>TAHUN PEMBUATAN</th>
                                <th>BAHAN BAKAR</th>
                                <th>HARGA</th>>
                                <th>ACTION</th>
                
              </tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
            include "../login/connect.php"; //sambungkan ke database
            
            $hasil=mysql_query("SELECT * FROM `tb_mobil`,tb WHERE id_mobil NOT IN (SELECT id_mobil FROM tb_pemesanan ) AND id_mobil NOT IN (SELECT id_mobil FROM tb_penjualan)");
            while ($baris = mysql_fetch_array($hasil)){
            
            echo"
              <td>$baris[id_mobil]</td>
              <td>$baris[unit]</td>
              <td>$baris[jenis_tipe]</td>
              <td>$baris[warna]</td>
              <td>$baris[tahun_pembuatan]</td>
              <td>$baris[bahan_bakar]</td>
              <td>$baris[harga]</td>
              "?>
                            <td><a href=gudangubah_mobil.php?id_mobil=<?php echo $baris['id_mobil']?>            
                <li>
                  <span class="glyphicon glyphicon-wrench"></span>
                  <span class="glyphicon-class">Setting</span>
                </li>
                
                                    <br>
                <a href=hapus_mobil.php?NIP=<?php echo $baris['id_mobil']?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"           
                <li>
                  <span class="glyphicon glyphicon-trash"></span>
                  <span class="glyphicon-class">Hapus</span>
                </li>
                                </a>
                            </td>
                            </tr>
<?php  } ?>
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
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    </html>

          <?php
}
  ?>