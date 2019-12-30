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
                    <h2>Tabel Pengolahan Data Perusahaan</h2>
                    
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
								<th>ID</th>
								<th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Bagian</th>
                                <th>NIP</th>
                                <th>Gambar</th>
                                <th>ACTION</th>
    						
							</tr>
                        </thead>
                        <tbody>
                        <tr>
                       <?php 
						include "../login/connect.php"; //sambungkan ke database
						$no = 1;
						$hasil=mysql_query("SELECT * FROM `user` ORDER BY `id`ASC ");
						while ($baris = mysql_fetch_array($hasil)){
						
						echo"
							<td>$no</td>
							<td>$baris[id]</td>
							<td>$baris[nama]</td>
							<td>$baris[username]</td>
							<td>$baris[password]</td>
							<td>$baris[bagian]</td>
							<td>$baris[nip]</td>
							<td>$baris[gambar]</td>
							";?>
                            <td><a href=update_pensiun.php?NIP=<?php echo $baris['id']?>            
                <li>
                  <span class="glyphicon glyphicon-wrench"></span>
                  <span class="glyphicon-class">Setting</span>
                </li>
                            		</a>
                                    <br>
                            <a href=hapus.php?NIP=<?php echo $baris['id']?> onClick="return confirm('Apakah Anda Yakin Hapus data?')"           
                <li>
                  <span class="glyphicon glyphicon-trash"></span>
                  <span class="glyphicon-class">Hapus</span>
                </li>
                            		</a></td>
                          </tr>
<?php $no ++; } ?>
					</tbody>

					</table>
                    <form method="post" action="admininput_user.php">
                    <button allign="canter" class="btn btn-app"><i class="fa fa-edit"></i> Add New</button>
                    </form>
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