<?php
if(!isset($_SESSION)) {
     session_start();
	include "../login/connect.php";
	include("session.php");

	$verifikasi= $_POST['verifikasi'];
	$id_pemesanan= $_POST['id_pemesanan'];   
	$id_mobil = $_POST['idmobil'];
	$tanggal = $_POST['tanggal'];
	$biaya = $_POST['biaya'];
	$hg = mysql_fetch_array(mysql_query(" SELECT * from tb_mobil where id_mobil= '2'"));
	$angka = $hg['harga'];
	$total=  $angka+$biaya;

	$tb_penjualan = mysql_query("INSERT INTO `tb_penjualan`(`id_pemesanan`, `id_mobil`, `tgl_penjualan`, `total_harga`) VALUES ('$id_pemesanan','$id_mobil','$tanggal','$total');");

	$ver = mysql_query("UPDATE `peramalan`.`tb_pemesanan` SET `verifikasi` = '$verifikasi' WHERE `tb_pemesanan`.`id_pemesanan` = '$id_pemesanan';");

if ($tb_penjualan && $ver ){
//echo "Sukses";
?><script>document.location.href="admintabel_penjualan.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}}
?>