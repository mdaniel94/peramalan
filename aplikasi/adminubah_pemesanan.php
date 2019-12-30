<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");
	$id_pemesanan = $_GET['id_pemesanan'];
	$hasil = mysql_query("SELECT * FROM tb_pemesanan WHERE id_pemesanan = $id_pemesanan");
	$baris = mysql_fetch_array($hasil);
	$pel = mysql_query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$baris[id_pelanggan]'");
	$baris2 = mysql_fetch_array($pel);
  $query2 = mysql_query("SELECT * FROM `tb_pelanggan`");
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
                <h3>Input Pemesanan</h3>
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
                    <h2>Ubah Data Pemesanan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div align="center">
                    <table width="70%" height="80%"  border="0">
                      <form name="postform"  align="center" method="post" action="adminproses_updatepemesanan.php">
                      <input name="idpemesanan" hidden="" type="text" value="<?php echo $baris['id_pelanggan'];?>"  required class="form-control "/>
                              <tr>
		                        <td>ID Pelanggan Pemesanan</td>
                            <td ><b>::::</b></td>
                            <td><select class="form-control" id='dropdown' name="idpelanggan">
                              <?php 
                              while($pel = mysql_fetch_array($query2)){
                              echo "<option value=$pel[id_pelanggan]>$pel[nama] ($pel[no_ktp])</option>";
                              }
                              ?>                            
                              </select>
                              </td>
	                          </tr>
                              <tr>
		                        <td>Nama Pelanggan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="nama" disabled="" value="<?php echo $baris2['nama'];?>" type="text" required class="form-control ">                 
                                </td>
	                          </tr>
		                      <tr>
		                        <td>No KTP</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="no" disabled="" value="<?php echo $baris2['no_ktp'];?>" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Alamat Tinggal</td>
		                        <td ><b>::::</b></td>
		                        <td><textarea name="alamat" disabled=""  type="text"required class="form-control "><?php echo $baris2['alamat_tinggal'];?></textarea></td>
	                          </tr>
                              <tr>
		                        <td>No Telepon</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="notlpn" disabled="" type="text" value="<?php echo $baris2['no_telepon'];?>" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Pekerjaan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="pekerjaan" disabled="" type="text" value="<?php echo $baris2['pekerjaan'];?>" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Jenis Mobil Pesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="idmobil" disabled="" type="text" value="<?php echo $baris2['pekerjaan'];?>"  required class="form-control "/>
                                </td>
	                          </tr>
                              <tr>
		                        <td>Pendapatan Perbulan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="pendapatan" disabled="" type="text" value="<?php echo $baris2['pendapatan'];?>" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Tanggal Pemesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="tanggal" type="text" value="<?php echo $baris['tanggal_pemesanan'];?>" required class="form-control "></td>
	                          </tr>
                            <tr>
                            <td>Estimasi</td>
                            <td ><b>::::</b></td>
                            <td><input name="estimasi" type="text" value="<?php echo $baris['estimasi'];?>" required class="form-control "></td>
                            </tr>
                              <tr>
		                        <td>Jenis Pemesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><select class="form-control" required name="jenis">
                              <option selected="selected"><?php echo $baris['jenis_pemesanan'];?></option>
                              <option>Cash</option>
                              <option>Credit</option>
                            </select></td>
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