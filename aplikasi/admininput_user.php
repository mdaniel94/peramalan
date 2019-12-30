<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");
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
                      <form name="postform" align="center" method="post" action="adminproses_isiuser.php">
                      
                      		<tr>
		                        <td>Id User</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="id" type="text"  required class="form-control "/>
                            </td>
                     
                              <tr>
		                        <td>Nama</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="nama" type="text"  required class="form-control "/>
                                </td>
	                          </tr>
                              <tr>
		                        <td>Username</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="username" type="text"  required class="form-control "/>
                                </td>
	                          </tr>
                             
                              <tr>
		                        <td>Password</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="password" type="text" required class="form-control ">                 
                                </td>
	                          </tr>
                              <tr>
		                        <td>Bagian</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="bagian" type="text" required class="form-control ">                 
                                </td>
	                          </tr>
		                      <tr>
		                        <td>NIP</td>
		                        <td ><b>::::</b></td>
		                        <td><input name="nip" type="text" required class="form-control "></td>
	                          </tr>
                              <tr>
		                        <td>Gambar</td>
		                        <td ><b>::::</b></td><td><input type="file" name="file" id="file"></td>
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