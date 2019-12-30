<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");
	$id_mobil = $_GET['id_mobil'];//mengambil nilai kode pasien dari address bar

	//mengambil data dari table pasien yg sesuai dengan pilihan user
	$hasil = mysql_query("SELECT * FROM tb_mobil,tb_suplie WHERE tb_mobil.id_mobil = tb_suplie.id_mobil AND tb_mobil.id_mobil =$id_mobil");
	//memecah hasil query ke dalam array
	$baris = mysql_fetch_array($hasil);
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
                    <table width="70%" height="80%"  border="0">
                      <form name="postform" align="center" method="post" action="gudangproses_ubah.php">
                      <input name="id_user" type="hidden" value="<?php echo "$id";?>"  required class="form-control "/>
                              <tr>
		                        <td>ID Mobil</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="id" type="text" value="<?php echo $baris['id_mobil']?>" required class="form-control "/>
                                </td>
	                          </tr>
                              <tr>
							  <tr>
		                        <td>Tanggal Pengiriman</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="tanggal_pengiriman"  type="text" value="<?php echo $baris['tanggal_pengiriman']?>" required class="form-control "/>
                                </td>
	                          </tr>
                              <tr>
		                        <td>Alamat Pengirim</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="alamat_kiriman" type="text" type="text" value="<?php echo $baris['alamat_kiriman']?>" required class="form-control "/>
                                </td>
	                          </tr>
                             
                              <tr>
		                        <td>Unit</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="unit" type="text" type="text" value="<?php echo $baris['unit']?>" required class="form-control ">                 
                                </td>
	                          </tr>
                              <tr>
		                        <td>Jenis Tipe Mobil</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="jenis_tipe" type="text" type="text" value="<?php echo $baris['jenis_tipe']?>" required class="form-control ">                 
                                </td>
	                          </tr>
		                      <tr>
		                        <td>Warna</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="warna" type="text" type="text" value="<?php echo $baris['warna']?>" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Tahun Pembuatan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="tahun" type="text" type="text" value="<?php echo $baris['tahun_pembuatan']?>" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Bahan Bakar</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="bahan_bakar" type="text" type="text" value="<?php echo $baris['bahan_bakar']?>" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Harga</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="harga" type="text" type="text" value="<?php echo $baris['harga']?>" required class="form-control "></td>
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
                </div>.
				0
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