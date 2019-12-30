 <?php

include "login/connect.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
include "aplikasi/session.php";

$tahun= $_POST['tahun'];
$idmobil= $_POST['idmobil'];
$semester= $_POST['semester'];

if ($idmobil==0) {
  $PK= mysql_fetch_array(mysql_query("SELECT MIN(tgl_penjualan) AS tanggalawal FROM tb_penjualan")); 
  $P= mysql_fetch_array(mysql_query(" SELECT MAX(tgl_penjualan) AS tanggalawal FROM tb_penjualan"));
}else{
$PK= mysql_fetch_array(mysql_query(" SELECT MIN(tgl_penjualan) AS tanggalawal FROM tb_penjualan inner JOIN tb_mobil USING(id_mobil)where unit='$idmobil'")); 
$P= mysql_fetch_array(mysql_query(" SELECT MAX(tgl_penjualan) AS tanggalawal FROM tb_penjualan inner JOIN tb_mobil USING(id_mobil)where unit='$idmobil'")); 
}
$PK1 =($PK['tanggalawal']);
$P1 =($P['tanggalawal']);

$date = strtotime ( $PK1 ); 
$y = date ( 'Y' , $date ); // tahun paling akhir

$date1 = strtotime ( $P1 );
$y1 = date ( 'Y' , $date1 );// tahun paling awal
  
$var=$y1-$y;
$an=1;

$tes=4;
echo "$tes";
echo "$var";
?>
<!DOCTYPE html>
<html lang="en">
<title>Tabel Pemesanan</title>
  <head>
    <!-- Bootstrap -->
    <link href="aplikasi/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="aplikasi/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    
    <link href="build/css/custom.min.css" rel="stylesheet">
    
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
    <link href="aplikasi/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="aplikasi/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="aplikasi/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="aplikasi/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    
    </head>
    <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Tabel Peramalan TREND Least Sqaure</h3>
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
                    <h2>Tabel Pengolahan Data Peramalan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                      if($tes % 2 == 0){?>


  <table class="table table-striped table-bordered" id="datatable" >
            <thead>
              <tr align="center">
                <th>NO</th>
                <th>Tahun</th>
                <th>X (Variabel Waktu)</th>
                  <th>Y (Jumlah mobil)</th>
                  <th>XY</th>
                <th>XX Mobil</th>
              </tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php

          $hasil=$tes-1;
          $hasil2=$hasil*-1;
          if ($semester == 0){
for ($u=0; $u <2; $u++,$y++,$an++) { 
  echo "$u";
}
}else if ($semester == 1) {
  for ($i=$hasil2; $i <= $hasil; $i=$i+2, $y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='1' and unit='$idmobil'"));  
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='2' and unit='$idmobil'"));
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='3' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs=$TA1+$TB1+$TC1;


          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;


            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php ; 
}
}else if ($semester == 2){
  for ($i=$hasil2; $i < $hasil; $i=$i+2,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='4' and unit='$idmobil'"));  
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)USING(id_mobil) where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='5' and unit='$idmobil'"));
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='6' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs=$TA1+$TB1+$TC1;

          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
            
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php  
}

}else if ($semester == 3){
 for ($i=$hasil2; $i < $hasil; $i=$i+2,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='7' and unit='$idmobil'")); 
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='8' and unit='$idmobil'")); 
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='9' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);

  $rs=$TA1+$TB1+$TC1;
          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
           
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php ;
}
}else if ($semester == 4){
 for ($i=$hasil2; $i < $hasil; $i=$i+2,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='10' and unit='$idmobil'")); 
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='11' and unit='$idmobil'")); 
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='12' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs=$TA1+$TB1+$TC1;
          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
            
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php 
}
}
        
        {
          $count= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM `tb_penjualan` WHERE year(`tgl_penjualan`)='$y'")); 
                    $rs =($count['hitung']);
          $yu=$i*$rs;
          $xx=$i*$i;
          $wa= array($yu);
            
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              ";
              

        
              ?>
                            
                            </tr>
<?php } 
$ad=array_sum($rr);
$ad1=array_sum($rr1);
$ad2=array_sum($rr2);
?>
          </tbody>

          </table>

<?php }else{?>
<table class="table table-striped table-bordered" id="datatable" >
            <thead>
              <tr align="center">
                              <th>NO</th>
                <th>Tahun</th>
                <th>X (Variabel Waktu)</th>
                                <th>Y (Jumlah mobil)</th>
                                <th>XY</th>
                <th>XX Mobil</th>
              </tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php
             
          {$hasil=$tes-1;
          $hasil2=$hasil/2;
          $hasil3=$hasil2*-1;};
          if ($semester == 0){
for ($u=0; $u < 2; $u++,$y++,$an++) { 
  echo "$u";
}
}else if ($semester == 1) {
  for ($i = $hasil3; $i <= $hasil2; $i++,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='1' and unit='$idmobil'"));  
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='2' and unit='$idmobil'"));
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='3' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs=$TA1+$TB1+$TC1;

          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
           
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php

}
}else if ($semester == 2){
  for ($i=$hasil2; $i <= $hasil; $i=$i+2,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='4' and unit='$idmobil'")); 
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='5' and unit='$idmobil'")); 
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='6' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs=$TA1+$TB1+$TC1;

          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
            
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php  
}

}else if ($semester == 3){
 for ($i = $hasil3; $i <= $hasil2; $i++,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='7' and unit='$idmobil'")); 
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='8' and unit='$idmobil'")); 
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='9' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs=$TA1+$TB1+$TC1;
          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
            
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php
}
}else if ($semester == 4){
 for ($i = $hasil3; $i <= $hasil2; $i++,$y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='10' and unit='$idmobil'")); 
  $TA1 =($TA['hitung']);
  $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='11' and unit='$idmobil'")); 
  $TB1 =($TB['hitung']);
  $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='12' and unit='$idmobil'")); 
  $TC1 =($TC['hitung']);
  $rs =$TA1+$TB1+$TC1;
          $yu=$i*$rs;
          $xx=$i*$i;  
          $rr[]=$yu;
          $rr1[]=$rs;
          $rr2[]=$xx;
            
            
            echo "<td>$an</td>
              <td>$y</td>
              <td>$i</td>
              <td>$rs</td>
              <td>$yu</td>
              <td>$xx</td>
              "
              ?>                 
              </tr>
              <?php 
}
}
          
;
$ad=array_sum($rr);
$ad1=array_sum($rr1);
$ad2=array_sum($rr2);


?>
          </tbody>

          </table>
                    
                    

    
   <?php } 
echo "$rs";
   ?>
   
   <table class="table table-striped table-bordered" id="datatable" >
            <thead>
              <tr align="center">
                                <th>N</th>
                                <th>Variabel Selanjutnya</th>
                                <th>jumlah y</th>
                                <th>jumlah xy</th>
                                <th>Jumlah xx</th>
                                <th>Hasil Penjualan</th>
                                <th>Akurasi</th>
                                
              </tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php
                       $an1=$an-1;
                       $nil1=$ad1/$an1;
                        $nil2=$ad/$ad2;
                        $nil3=$nil2*$i;
                        $nil4=$nil1+$nil3;
                        $mape=$rs-$nil4;
                        $mape2=$mape/$rs;
                        $mape3=$mape2*100;
             echo "
              <td>$an1</td>
              <td>$i</td>
              <td>$ad1</td>
              <td>$ad</td>
              <td>$ad2</td>
              <td>$nil4</td>
              <td>floor($mape3) %</td>
              "
             ?>
             </tr>
                        </tbody>
<?php

                        

                        if ($semester==0) {
                          $sem='seluruh tahun';
                        }else if ($semester==1) {
                          $sem='Semester I';
                        }else if ($semester==2) {
                          $sem='Semester II';
                        }else if ($semester==3) {
                          $sem='Semester III';
                        }elseif ($semester==4) {
                          $sem='Semester IV';

                        }
?>


                      

                          <form name="postform" align="center" method="post" action="adminproses_inputpemesanan.php">
                         <input name="jenis_tipe" type="hidden" value="<?php echo "$idmobil";?>"  required class="form-control "/>
                         <input name="semester" type="hidden" value="<?php echo "$sem";?>"  required class="form-control "/>
                         <input name="tahun" type="hidden" value="<?php echo "$y";?>"  required class="form-control "/>
                         <input name="hasil" type="hidden" value="<?php echo "$nil4";?>"  required class="form-control "/>
                          <button type="submit" class="btn btn-success">Submit</button>
                          </form>

                        </div>
                      </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- jQuery -->
    <script src="aplikasi/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="aplikasi/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="aplikasi/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="aplikasi/vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="aplikasi/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="aplikasi/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="aplikasi/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="aplikasi/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    
    </html>



