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

$kr= mysql_fetch_array(mysql_query("SELECT COUNT(DISTINCT(year(tgl_penjualan))) as hitung FROM tb_penjualan")); 
$tes =($kr['hitung']);

$queryposting= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM tb_mobil INNER JOIN tb_penjualan ON tb_penjualan.id_mobil=tb_mobil.id_mobil WHERE unit='Xenia'"));

if($tes % 2 == 0)
                {$hasil=$tes-1;
				$ia=$hasil*-1;
				
				for ($i=$hasil2; $i <= $hasil; $i=$i+2,$y++)
				
				{
					echo $i;
					echo "<br />";
					echo "$y-$m-$d Sd $y-$m1-$d1";
					echo "<br />";
					}}
            else
                {{$hasil=$tes-1;
				$hasil2=$hasil/2;
				$ia=$hasil2*-1;};
				
				
				{
					$count= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM `tb_penjualan` WHERE tgl_penjualan BETWEEN '$y-$m-$d' AND '$y-$m1-$d1'")); 
                   
					}}
					
					if($tes % 2 == 0){
			        ?>

			        <table border="2" class="table table-striped table-bordered" id="datatable0" >
						<thead>
							<tr align="center">
                                
								<th>NO</th>
								<th>Year</th>
								<th>Penjualan</th>
								<th>Variabel Tahun</th>
                                <th>X*X</th>
                                <th>X*Y</th>
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
					   $no=1;
						$hasil=mysql_query("SELECT DISTINCT(year(tgl_penjualan)) as hitung FROM tb_penjualan");
						while ($baris = mysql_fetch_array($hasil)){
						$sa=$ia*$ia;
						echo "
							<td>$no</td>
							<td>$baris[hitung]</td>";
							$pel = mysql_query("SELECT Count(tgl_penjualan) as jumlah FROM tb_penjualan WHERE year(tgl_penjualan)=$baris[hitung]");
							$pelanggan = mysql_fetch_array($pel);
							$sb=$ia*$pelanggan['jumlah'];
							echo 
							"
							<td>$pelanggan[jumlah]</td>";
							echo
							"
							
							<td>$ia</td>";
							echo"
							<td>$sa</td>
							<td>$sb</td>
							" ?>
                            </tr>
<?php $no++;$ia=$ia+2; } ?>
					</tbody>
					</table>
                    <?php }else{ ?>
                    <table border="2" class="table table-striped table-bordered" id="datatable0" >
						<thead>
							<tr align="center">
                                
								<th>NO</th>
								<th>Year</th>
								<th>Penjualan</th>
								<th>Variabel Tahun</th>
                                <th>X*X</th>
                                <th>X*Y</th>
							</tr>
                         </thead>
                        <tbody>
                        <tr>
                       <?php 
					   $no=1;
					   $ia=-2;
						$hasil=mysql_query("SELECT DISTINCT(year(tgl_penjualan)) as hitung FROM tb_penjualan");
						while ($baris = mysql_fetch_array($hasil)){
						$sa=$ia*$ia;
						echo "
							<td>$no</td>
							<td>$baris[hitung]</td>";
							$pel = mysql_query("SELECT Count(tgl_penjualan) as jumlah FROM tb_penjualan WHERE year(tgl_penjualan)=$baris[hitung]");
							$pelanggan = mysql_fetch_array($pel);
							$sb=$ia*$pelanggan['jumlah'];
							echo 
							"
							<td>$pelanggan[jumlah]</td>";
							echo
							"
							
							<td>$ia</td>";
							echo"
							<td>$sa</td>
							<td>$sb</td>
							" ?>
                            </tr>
<?php $no++;$ia++; } ?>
					</tbody>
					</table>
                    <?php }?>
