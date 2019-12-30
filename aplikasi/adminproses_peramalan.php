 <?php
if(!isset($_SESSION)) {
     session_start();

include "../login/connect.php"; //sambungkan ke database
//query untuk mengambil data ke mysql
include "session.php";

$tahun= $_POST['tahun'];
$idmobil= $_POST['idmobil'];
$semester= $_POST['semester'];
$null=0;


$PK= mysql_fetch_array(mysql_query(" SELECT MIN(tgl_penjualan) AS tanggalawal FROM tb_penjualan inner JOIN tb_mobil USING(id_mobil)where unit='$idmobil'")); 
$P= mysql_fetch_array(mysql_query(" SELECT MAX(tgl_penjualan) AS tanggalawal FROM tb_penjualan inner JOIN tb_mobil USING(id_mobil)where unit='$idmobil'")); 

$PK1 =($PK['tanggalawal']);
$P1 =($P['tanggalawal']);

$date = strtotime ( $PK1 ); 
$y = date ( 'Y' , $date ); // tahun paling akhir

  
$var=$tahun-$y;
$an=1;

$yr=$y;

$tes=$var;
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
          if ($semester == 1) {
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


            
            echo "
              <td>$an</td>
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
  for ($i=$hasil2; $i <= $hasil; $i=$i+2, $y++,$an++) { 
  $TA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='4' and unit='$idmobil'"));  
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
            
            
            echo "
              <td>$an</td>
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
 for ($i=$hasil2; $i <= $hasil; $i=$i+2,$y++,$an++) { 
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
           
            
            echo "
              <td>$an</td>
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
 for ($i=$hasil2; $i <= $hasil; $i=$i+2,$y++,$an++) { 
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
            
            
            echo "
              <td>$an</td>
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
          $count= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' and unit='$idmobil'")); 

          $rs =($count['hitung']);
          $yu=$i*$rs;
          $xx=$i*$i;
            
            
            echo "
              <td>$an</td>
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
          if ($semester == 1) {
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
  for ($i = $hasil3; $i <= $hasil2; $i++,$y++,$an++) { 
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

  
   ?>
   
   <table class="table table-striped table-bordered" id="datatable" >
            <thead>
              <tr align="center">
                                <th>Year</th>
                                <th>Variabel Selanjutnya</th>
                                <th>jumlah y</th>
                                <th>jumlah xy</th>
                                <th>Jumlah xx</th>
                                <th>Hasil Penjualan</th>
                                <th>Persentase Error</th>
                                
              </tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php
                       $hea=$tahun-$yr;
                       if($tes % 2 == 0){
                        $hasil=$tes-1;
                        $hasil2=$hasil*-1;
                        for ($he=$i; $he <= $hea; $he=$he+2) {
                          ;
                        } 
                       }else{
                        $hasil=$tes-1;
                        $hasil2=$hasil/2;
                        $hasil3=$hasil2*-1;
                        for ($he = $i; $he <= 3; $he++) {
                          ;
                       }
                      }

                       $PD= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' and unit='$idmobil'")); 

                       $PD1 =($PD['hitung']);
                       $ch= mysql_fetch_array(mysql_query("SELECT hasil FROM `tb_peramalan` WHERE id_peramalan='1'")); 

                       $ch1 =($ch['hasil']);
                       
                        $an1=$an-1;
                        $nil1=$ad1/$an1;
                        $nil2=$ad/$ad2;
                        $nil3=$nil2*$he;
                        $nil4=$nil1+$nil3;
                        if ($semester == 1) {
                          $WA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='1' and unit='$idmobil'")); 
                          $WA1 =($WA['hitung']);
                          $WB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='2' and unit='$idmobil'")); 
                          $WB1 =($WB['hitung']);
                          $WC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='3' and unit='$idmobil'")); 
                          $WC1 =($WC['hitung']);
                          $hsl =$WA1+$WB1+$WC1;
                        } else if ($semester == 2) {
                          $WA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='4' and unit='$idmobil'")); 
                          $WA1 =($WA['hitung']);
                          $WB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='5' and unit='$idmobil'")); 
                          $WB1 =($WB['hitung']);
                          $WC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='6' and unit='$idmobil'")); 
                          $WC1 =($WC['hitung']);
                          $hsl =$WA1+$WB1+$WC1;
                        }else if ($semester == 3) {
                          $WA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='7' and unit='$idmobil'")); 
                          $WA1 =($WA['hitung']);
                          $WB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='8' and unit='$idmobil'")); 
                          $WB1 =($WB['hitung']);
                          $WC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='9' and unit='$idmobil'")); 
                          $WC1 =($WC['hitung']);
                          $hsl =$WA1+$WB1+$WC1;
                        }else if ($semester == 4) {
                          $WA= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='10' and unit='$idmobil'")); 
                          $WA1 =($WA['hitung']);
                          $WB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='11' and unit='$idmobil'")); 
                          $WB1 =($WB['hitung']);
                          $WC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$tahun' AND month(tgl_penjualan)='12' and unit='$idmobil'")); 
                          $WC1 =($WC['hitung']);
                          $hsl =$WA1+$WB1+$WC1;
                        }
                        if ($hsl==0) {
                          $mape3=0;
                        }else{
                        $mape=abs($hsl-$nil4);
                        $mape2=$mape/$hsl;
                        $mape3=$mape2*100;}
             echo "
              <td>$tahun</td>
              <td>$he</td>
              <td>$ad1</td>
              <td>$ad</td>
              <td>$ad2</td>
              <td>$nil4</td>
              <td>$mape3 %</td>
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


                      

                          <form name="postform" align="center" method="post" action="adminproses_inputperamalan.php">
                          <input name="id_peramalan" type="hidden" value="<?php echo "$tahun$semester-$idmobil";?>"  required class="form-control "/>
                         <input name="jenis_tipe" type="hidden" value="<?php echo "$idmobil";?>"  required class="form-control "/>
                         <input name="semester" type="hidden" value="<?php echo "$sem";?>"  required class="form-control "/>
                         <input name="tahun" type="hidden" value="<?php echo "$tahun";?>"  required class="form-control "/>
                         <input name="hasil" type="hidden" value="<?php echo "$nil4";?>"  required class="form-control "/>
                         <input name="error" type="hidden" value="<?php echo "$mape3";?>"  required class="form-control "/>
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
    
    </html>




<?php

}
?>