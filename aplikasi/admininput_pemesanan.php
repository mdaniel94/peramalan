<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");
	$query = mysql_query("SELECT `id_mobil`, `unit`, `jenis_tipe`, `warna`, `tahun_pembuatan`, `bahan_bakar`, `harga` FROM `tb_mobil` WHERE id_mobil NOT IN (SELECT id_mobil FROM tb_pemesanan ) AND id_mobil NOT IN (SELECT id_mobil FROM tb_penjualan)");
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
                    <h2>Input Data Pemesanan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div align="center">
                    <table width="70%" height="80%"  border="0">
                      <form name="postform" align="center" method="post" action="adminproses_inputpemesanan.php">
                         <input name="id_user" type="hidden" value="<?php echo "$id";?>"  required class="form-control "/>
                              <tr>
                                <td>ID Pelanggan Pemesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><select class="form-control" id='dropdown' name="idpelanggan">
                              <option value="0" selected="selected">ID BARU</option>
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
		                        <td><input name="nama" id="textinput" type="text" required class="form-control ">                 
                                </td>
	                          </tr>
		                      <tr>
		                        <td>No KTP</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="no" id="textinput1" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Alamat Tinggal</td>
		                        <td ><b>::::</b></td>
		                        <td><textarea name="alamat" id="textinput2" type="text" required class="form-control "></textarea></td>
	                          </tr>
                              <tr>
		                        <td>No Telepon</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="notlpn" id="textinput3" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Pekerjaan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="pekerjaan" id="textinput4" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>ID Mobil yang di pesan</td>
		                        <td ><b>::::</b></td>
		                        <td><select class="form-control" required name="idmobil">
                              <option value="0" selected="selected">-Jenis Mobil-</option>
                              <?php 
                              while($mob = mysql_fetch_array($query)){
                              echo "<option value=$mob[id_mobil]>$mob[unit].$mob[jenis_tipe],$mob[warna],$mob[id_mobil]</option>";
                              }
                              ?>                            
                              </select>
                              </td>
	                          </tr>
                              <tr>
		                        <td>Pendapatan Perbulan</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="pendapatan" id="textinput5" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Tanggal Pemesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><div class="form-group">
							<div class='input-group date' id='datepicker'>
								<input type='text' name="tanggal" class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
                            </td>
	                          </tr>
                              <tr>
		                        <td>Jenis Pemesanan</td>
		                        <td ><b>::::</b></td>
		                        <td><select class="form-control" required name="jenis">
                              <option selected="selected">-Jenis Pemesanan-</option>
                              <option value="0" >Cash</option>
                              <option value="1" >Credit</option>
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
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
			$(function () {
				$('#datepicker').datetimepicker({
					format: 'YYYY-MM-DD',
				});
			});

      $('#dropdown').change(function(){
        if($(this).val()== 0 ){
          $('#textinput').prop("disabled", false);
          $('#textinput1').prop("disabled", false);
          $('#textinput2').prop("disabled", false);
          $('#textinput3').prop("disabled", false);
          $('#textinput4').prop("disabled", false);
          $('#textinput5').prop("disabled", false);
        
        }else{
          $('#textinput').prop("disabled", true);
          $('#textinput1').prop("disabled", true);
          $('#textinput2').prop("disabled", true);
          $('#textinput3').prop("disabled", true);
          $('#textinput4').prop("disabled", true);
          $('#textinput5').prop("disabled", true);
        }
      })

	</script>
  <?php
}
  ?>