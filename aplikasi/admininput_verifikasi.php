<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");
	$id_pemesanan = $_GET['id_pemesanan'];
	$pel = mysql_query("SELECT * FROM tb_pemesanan WHERE id_pemesanan = '$id_pemesanan'");
	$baris = mysql_fetch_array($pel);
	?>
    
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
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
                <h3>Input Data</h3>
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
                    <h2>Verifikasi Data Penjualan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div align="center">
                    <table width="70%" height="100%"  border="0">
                      <form name="postform"  align="center" method="post" action="adminproses_verifikasi.php">
		                      <tr>
                          <input name="verifikasi" type="hidden" required class="form-control col-md-7 col-xs-12" value="1" id="first-name2">
                          
		                        <td>ID Pemesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="id_pemesanan"  type="text" value="<?php echo $baris['id_pemesanan'];?>" required class="form-control "/>
                                </td>
	                          </tr>
                              <tr>
		                        <td>ID Mobil</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="idmobil"  value="<?php echo $baris['id_mobil'];?>" type="text" required class="form-control ">                 
                                </td>
	                          </tr>
		                      <tr>
		                        <td>Tanggal_penjualan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="tanggal" value="<?php echo date('Y-m-d')?>" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Biaya administrasi dan pajak</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="biaya" type="text" required class="form-control "></td>
	                          </tr>
                              
  <td colspan="3"><div align="center">
  
		                   <button onClick="return confirm('Apakah Anda Yakin Mereset semua data yang sudah di ketik?')" type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
		                        </div></td>
		                        </tr>
		                        
	                        </form>
	                      </table>
                   </div>
                 </div>
                </div>
              </div>
            </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  <?php
}
  ?>