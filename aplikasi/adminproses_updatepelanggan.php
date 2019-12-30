<?php
include "../login/connect.php";

$id_pelanggan= $_POST['id_pelanggan'];   
$nama = $_POST['nama'];
$no = $_POST['no'];
$alamat = $_POST['alamat'];
$notlpn = $_POST['notlpn']; 
$pekerjaan = $_POST['pekerjaan']; 
$pendapatan = $_POST['pendapatan'];

$query= mysql_query("UPDATE `peramalan`.`tb_pelanggan` SET `nama` = '$nama', `no_ktp` = '$no', `alamat_tinggal` = '$alamat', `no_telepon` = '$notlpn', `pekerjaan` = '$pekerjaan', `pendapatan` = '$pendapatan' WHERE `tb_pelanggan`.`id_pelanggan` = '$id_pelanggan';");

if ($query){
//echo "Sukses";
?><script>document.location.href="admintabel_pemesanan.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}
?>