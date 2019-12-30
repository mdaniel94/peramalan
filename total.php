<?php
$host="localhost"; //deklarasi variabel
$user="root"; 
$password=""; 
$database="peramalan"; 

//sambungkan ke database
$koneksi=mysql_connect($host,$user,$password); 

//memilih database yang akan dipakai
$con = mysql_select_db($database,$koneksi); 

$PK= mysql_fetch_array(mysql_query(" SELECT MIN(tgl_penjualan) AS tanggalawal FROM tb_penjualan")); 
$PK1 =($PK['tanggalawal']);

$Range= mysql_fetch_array(mysql_query(" SELECT * FROM `tb_penjualan` WHERE tgl_penjualan BETWEEN '2012-06-02' AND '2016-06-01'"));

$TA= mysql_fetch_array(mysql_query(" SELECT MAX(tgl_penjualan) AS tanggalakhir FROM tb_penjualan")); 
$TA1 =($TA['tanggalakhir']);

$date = strtotime ( $PK1 );
$y = date ( 'Y' , $date );
$m = date ( 'm' , $date );
$d = date ( 'd' , $date );

$tgl = strtotime ( $TA1 );
$m1 = date ( 'm' , $tgl );
$d1 = date ( 'd' , $tgl );

$c = array();



$ba= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM tb_penjualan  where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='$m'")); 
$ww =($ba['hitung']);



$is= mysql_fetch_array(mysql_query("SELECT COUNT(DISTINCT year(`tgl_penjualan`)) as jum FROM tb_penjualan")); 
$le =($is['jum']);

$tes=5;


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
					for ($i=$hasil2; $i < $hasil; $i=$i+2,$y++)
				
				{
					$count= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM `tb_penjualan` WHERE year(`tgl_penjualan`)='$y'")); 
                    $ht =($count['hitung']);
					$yu=$i*$ht;
					$xx=$i*$i;
					$wa= array($yu);
						$no = 1;
						
						echo "<td>$no</td>
							<td>$y</td>
							<td>$i</td>
							<td>$ht</td>
							<td>$yu</td>
							<td>$xx</td>
							";
							

				
							?>
                            
                            </tr>
<?php $no++;} ?>
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
					for ($i = $hasil3; $i <= $hasil2; $i++,$y++)
				{	
				$count= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM `tb_penjualan` WHERE year(`tgl_penjualan`)='$y '")); 
                    $ht =($count['hitung']);
					$yu=$i*$ht;
					
					$xx=$i*$i;
					
					$rr[]=$yu;
					$rr1[]=$ht;
					
					
						$no = 1;
						
						echo "<td>$no</td>
							<td>$y</td>
							<td>$i</td>
							<td>$ht</td>
							<td>$yu</td>
							<td>$xx</td>
							"
				
							?>
                            
                            </tr>
<?php $no++;} 
;
$ad=array_sum($rr);
$ad1=array_sum($rr1);

echo "$ad a";
echo "$ad1 b";
?>
					</tbody>

					</table>
                    
                    

    
   <?php }?>
   
   <table class="table table-striped table-bordered" id="datatable" >
						<thead>
							<tr align="center">
                            	<th>NO</th>
								<th>Variabel Selanjutnya</th>
								<th>jumlah y</th>
                                <th>jumlah xy</th>
                                
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php
					   echo "
							<td>$y</td>
							<td>$i</td>
							<td>$ad1</td>
							<td>$ad</td>
							"
					   ?>
					   </tr>
                        </tbody>
                        
                        
<?php
;
?>