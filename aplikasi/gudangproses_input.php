<?php
error_reporting(0);
include "../login/connect.php";
$id_user = $_POST['id_user']; 
$alamat_kiriman = $_POST['alamat_kiriman']; 
$unit = $_POST['unit'];
$jenis_tipe = $_POST['jenis_tipe'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun']; 
$tanggal_pengiriman = $_POST['tanggal']; 
$bahan_bakar = $_POST['bahan_bakar'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$nilai= mysql_fetch_array(mysql_query(" SELECT max(id_mobil) as Jumlah FROM tb_mobil")); 
$hasil =($nilai['Jumlah']);
$hasil2=$hasil+1;
for ($i=1; $i <= $jumlah; $i++,$hasil2++)
{
$tb_mobil = mysql_query("INSERT INTO `$database`.`tb_mobil` 
(`unit`, `jenis_tipe`, `warna`, `tahun_pembuatan`, `bahan_bakar`, `harga`) VALUES 
('$unit', '$jenis_tipe', '$warna', '$tahun', '$bahan_bakar', '$harga')");

$tb_suplie = mysql_query("INSERT INTO `$database`.`tb_suplie` 
(`id_mobil`,`id_user`,  `tanggal_pengiriman`, `alamat_kiriman`) VALUES 
('$hasil2', '$id_user', '$tanggal_pengiriman', '$alamat_kiriman')");
 
}


if ($tb_mobil && $tb_suplie){
//echo "sukses";
?>
<script>document.location.href="gudanginput.php"</script><?php
}else{?>
<script>document.location.href="gudanginput.php"</script>
<?php }?>
