<?php
function html_table($data= array())
{
	$rows = array();
	foreach ($data as $row) {
		$cells = array();
		foreach ($row as $cell) {
			$cells[] = "<td>{$cell}</td>";
		}
		$rows[] = "<tr>". implode('', $cells) . "</tr>";
	}
	return "<table class='hci-table'>". implode('',$rows) . "</table>";
}

	$data = array(
		array('a'),
		array('1')
		);
		
		echo html_table($data);
?>

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

$ba= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM tb_penjualan  where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='$m'")); 

$tes=5;

if($tes % 2 == 0)
                {$hasil=$tes-1;
				$hasil2=$hasil*-1;
				$count= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM `tb_penjualan` WHERE year(`tgl_penjualan`)='$y'")); 
                    $ht =($count['hitung']);
				
				for ($i=$hasil2; $i <= $hasil; $i=$i+2,$y++)
				
				{
					echo $i;
					echo "<br />";
					echo "$y";
					echo "<br />";
					echo "$ht";
					}}
            else
                {{$hasil=$tes-1;
				$hasil2=$hasil/2;
				$hasil3=$hasil2*-1;};
				
				for ($i = $hasil3; $i <= $hasil2; $i++,$y++)
				{
					$count= mysql_fetch_array(mysql_query("SELECT Count(*) as hitung FROM `tb_penjualan` WHERE year(`tgl_penjualan`)='$y'")); 
                    $ht =($count['hitung']);
					$yu=$i*$ht;

					echo $i;
					echo "<br />";
					echo "$y";
					echo "<br />";
					
					echo "$ht";
				    echo "<br />";
					echo "$yu";
				    echo "<br />";
					}}
?>