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

$no1=0;
$angka = array(4,4,5,2,6,6,6,6,4,8,5,6,4,8,5,5);

echo "<table border=1>";
for($i=0; $i<3; $i++){
	echo "<tr>";
	for($j=0; $j<5; $j++){
		echo "<td>";
		$angkabaru[$i]
		[$j]=$angka[$no1];
		$angkabaru1[$j]
		[$i]=$angkabaru[$i][$j];
		echo $angkabaru[$i]
		[$j];
		echo "</td>";
		$no1++;
	}
}
echo "</table>";
echo "nilai maksimal berdasarkan kolom : <br>";
for ($i=0; $i < 5; $i++){
$jumlah[$i]=array_sum($angkabaru1[$i]);
echo $jumlah[$i]. ",";
}

	
	$hg = mysql_fetch_array(mysql_query(" SELECT * from tb_mobil where id_mobil= '2'"));
	$angka = $hg['harga'];
	$total=  $angka+100000;

echo "$total<br>";



$tes=4;





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

					for ($i=$hasil2; $i <= $hasil; $i=$i+2,$y++)
				
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
                            	<th>No</th>
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
					$po=0;
					$po1=0;
					$po = $po + $yu;
					$po1 = $po1 + $ht;
					$arr[]=$yu;
					
					echo "$yu";
					
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
$ws=0;
$hs=implode("+",$c);
 $jum= $ws + $hs;
 
 echo $jum;

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
							<td>$po1</td>
							
							<td></td>
							<td>$yu</td>
							"
					   ?>
					   </tr>
                        </tbody>
                        
                        
<?php
$tahun=2012;
$p=0; 
$w=0;
for ($u=0; $u <5; $u++,$tahun++) { 
  $lp=$u+$p+$w;	


}

$PQ= mysql_fetch_array(mysql_query(" SELECT MIN(tgl_penjualan) AS tanggalawal FROM tb_penjualan")); 
$PI= mysql_fetch_array(mysql_query(" SELECT MAX(tgl_penjualan) AS tanggalawal FROM tb_penjualan")); 
$PQ1 =($PQ['tanggalawal']);
$PI1 =($PI['tanggalawal']);

echo "$PQ1";
echo "$PI1";

for ($i=-5; $i <= 3; $i=$i+2, $y++) { 
echo "$i<br>";
	}
echo "$i";

$hasil=mysql_query("SELECT DISTINCT year(`tgl_penjualan`) as tahun FROM `tb_penjualan`");
            while ($baris = mysql_fetch_array($hasil)){
            	echo "'$baris[tahun]',";
            }


?>