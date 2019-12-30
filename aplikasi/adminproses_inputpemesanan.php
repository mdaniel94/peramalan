<?php
error_reporting(0);
include "../login/connect.php";
$iduser= $_POST['id_user'];
$idpel= $_POST['idpelanggan'];  
$idpemesanan = $_POST['idpemesanan']; 
$nama = $_POST['nama'];
$no = $_POST['no'];
$alamat = $_POST['alamat'];
$notlpn = $_POST['notlpn']; 
$pekerjaan = $_POST['pekerjaan']; 
$pendapatan = $_POST['pendapatan'];
$idmobil = $_POST['idmobil']; 
$tanggal = $_POST['tanggal']; 
$jenis = $_POST['jenis'];

if ($idpel==0){
$nilai= mysql_fetch_array(mysql_query(" SELECT max(id_pelanggan) as Jumlah FROM tb_pelanggan")); 
$hasil =($nilai['Jumlah']);
$idpelanggan=$hasil+1;
}else {
$idpelanggan=$idpel;
}
$es= mysql_fetch_array(mysql_query(" SELECT harga from tb_mobil where id_mobil =$idmobil "));
$estimasi =($es['harga']);

$verifikasi=1;


if ($idpel==0){
$tb_pelanggan = mysql_query("INSERT INTO `$database`.`tb_pelanggan` 
(`nama`, `no_ktp`, `alamat_tinggal`, `no_telepon`, `pekerjaan`, `pendapatan`) VALUES 
('$nama', '$no', '$alamat', '$notlpn', '$pekerjaan', '$pendapatan')");

if ($jenis==0) {
	$jen=cash;
	$verifikasi=1;
	$total=$estimasi+1000000;

$tb_penjualan = mysql_query("INSERT INTO `tb_penjualan`(`id_pemesanan`, `id_mobil`, `tgl_penjualan`, `total_harga`) VALUES 
	('$idpemesanan','$idmobil','$tanggal','$total');");

$tb_pemesanan = mysql_query("INSERT INTO `$database`.`tb_pemesanan` 
(`id_pelanggan`,`id_mobil`, `tanggal_pemesanan`, `jenis_pemesanan`, `verifikasi`,estimasi) VALUES 
( '$idpelanggan', '$idmobil', '$tanggal', '$jen', '$verifikasi','$estimasi')");

if ($tb_pelanggan && $tb_pemesanan && $tb_penjualan){
//echo "sukses";
?>
<script>document.location.href="admininput_pemesanan.php"</script><?php
}else{?>
<script>document.location.href="admininput_pemesanan.php"</script>
<?php
}

}else{
$jen=credit;
	$verifikasi=0;

$tb_pemesanan = mysql_query("INSERT INTO `$database`.`tb_pemesanan` 
(`id_pelanggan`,`id_mobil`, `tanggal_pemesanan`, `jenis_pemesanan`, `verifikasi`,estimasi) VALUES 
( '$idpelanggan', '$idmobil', '$tanggal', '$jen', '$verifikasi','$estimasi')");

if ($tb_pelanggan && $tb_pemesanan){
//echo "sukses";
?>
<script>document.location.href="admininput_pemesanan.php"</script><?php
}else{?>
<script>document.location.href="admininput_pemesanan.php"</script>
<?php
}
}
$tb_pemesanan = mysql_query("INSERT INTO `$database`.`tb_pemesanan` 
(`id_pelanggan`,`id_mobil`, `tanggal_pemesanan`, `jenis_pemesanan`, `verifikasi`,estimasi) VALUES 
( '$idpelanggan', '$idmobil', '$tanggal', '$jen', '$verifikasi','$estimasi')");

if ($tb_pelanggan && $tb_pemesanan){
//echo "sukses";
?>
<script>document.location.href="admininput_pemesanan.php"</script><?php
}else{?>
<script>document.location.href="admininput_pemesanan.php"</script>
<?php
}
}else{

if ($jenis==0) {
	$jen=cash;
	$verifikasi=1;
	$total=$estimasi+1000000;

$tb_penjualan = mysql_query("INSERT INTO `tb_penjualan`(`id_pemesanan`, `id_mobil`, `tgl_penjualan`, `total_harga`) VALUES
	('$idpemesanan','$idmobil','$tanggal','$total');");

$tb_pemesanan = mysql_query("INSERT INTO `$database`.`tb_pemesanan` 
(`id_pelanggan`,`id_mobil`, `tanggal_pemesanan`, `jenis_pemesanan`, `verifikasi`,estimasi) VALUES 
( '$idpelanggan', '$idmobil', '$tanggal', '$jen', '$verifikasi','$estimasi')");

if ($tb_pelanggan && $tb_pemesanan && $tb_penjualan){
//echo "sukses";
?>
<script>document.location.href="admininput_pemesanan.php"</script><?php
}else{?>
<script>document.location.href="admininput_pemesanan.php"</script>
<?php
}

}else{
$jen=credit;
	$verifikasi=0;

$tb_pemesanan = mysql_query("INSERT INTO `$database`.`tb_pemesanan` 
(`id_pelanggan`,`id_mobil`, `tanggal_pemesanan`, `jenis_pemesanan`, `verifikasi`,estimasi) VALUES 
( '$idpelanggan', '$idmobil', '$tanggal', '$jen', '$verifikasi','$estimasi')");

if ($tb_pelanggan && $tb_pemesanan){
//echo "sukses";
?>
<script>document.location.href="admininput_pemesanan.php"</script><?php
}else{?>
<script>document.location.href="admininput_pemesanan.php"</script>
<?php
}
}
$tb_pemesanan = mysql_query("INSERT INTO `$database`.`tb_pemesanan` 
(`id_pelanggan`,`id_mobil`, `tanggal_pemesanan`, `jenis_pemesanan`, `verifikasi`,estimasi) VALUES 
( '$idpelanggan', '$idmobil', '$tanggal', '$jen', '$verifikasi','$estimasi')");

if ($tb_pelanggan && $tb_pemesanan){
//echo "sukses";
?>
<script>document.location.href="admininput_pemesanan.php"</script><?php
}else{?>
<script>document.location.href="admininput_pemesanan.php"</script>
<?php
}}
?>