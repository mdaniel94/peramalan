<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");
	$query = mysql_query("SELECT DISTINCT unit from tb_mobil");
	$PK= mysql_fetch_array(mysql_query(" SELECT MIN(tgl_penjualan) AS tanggalawal FROM tb_penjualan inner JOIN tb_mobil USING(id_mobil)")); 
  $PK1 =($PK['tanggalawal']);
  $date = strtotime ( $PK1 ); 
  $y = date ( 'Y' , $date ); // tahun paling akhir
  $query2=$y+2;
  $now= date("Y");
  $year=$now+10
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
                <h3>Input Perencanaan Mobil</h3>
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
                    <h2>Input Data Perencanaan Mobil</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div align="center">
                    <table width="70%" height="80%"  border="0">
                      <form name="postform" align="center" method="post" action="adminproses_peramalan.php">
                     
                              <tr>
		                        <td>Tahun Permalan</td>
		                        <td ><b>::::</b></td>
		                        <td><select class="form-control" required name="tahun">
                              <option value="0" selected="selected">-Tahun Peramalan-</option>
                              <?php 
                              for ($i=$query2; $i <=$year ;$i++) { 
                              echo "<option>$i</option>";
                              }
                              ?>                            
                              </select>
                                </td>
	                          </tr>
                              <tr>
		                        <td>Tipe Mobil</td>
		                        <td ><b>::::</b></td>
		                        <td><select class="form-control" required name="idmobil">
                              <option value="0" selected="selected">-Jenis Mobil-</option>
                              <?php 
                              while($mob = mysql_fetch_array($query)){
                              echo "<option>$mob[unit]</option>";
                              }
                              ?>                            
                              </select>
                                </td>
	                          </tr>
                             
                              <tr>
		                        <td>Bulan Semester</td>
		                        <td ><b>::::</b></td>
		                        <td>
                                <select class="form-control" required name="semester">
                              <option selected="selected">-Bulan-</option>  
                              <option value="1" >-Januari-Maret-</option>  
                              <option value="2" >-April-Juni-</option>  
                              <option value="3" >-Juli-September-</option>
                              <option value="4" >-September-Desember-</option>                 
                                </td>
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