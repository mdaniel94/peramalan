<?php
include "../login/connect.php";
$alamat_kiriman = $_POST['alamat_kiriman']; 
$unit = $_POST['unit'];
$id = $_POST['id'];
$jenis_tipe = $_POST['jenis_tipe'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun']; 
$tanggal= $_POST['tanggal_pengiriman'];
$bahan_bakar = $_POST['bahan_bakar'];
$harga = $_POST['harga'];

$tb_mobil = mysql_query("UPDATE `peramalan`.`tb_mobil` SET `unit` = '$unit', `jenis_tipe` = '$jenis_tipe', `warna` = '$warna', `tahun_pembuatan` = '$tahun', `bahan_bakar` = '$bahan_bakar', `harga` = '$harga' WHERE `tb_mobil`.`id_mobil` = $id;");

$tb_suplie = mysql_query("UPDATE `peramalan`.`tb_suplie` SET `alamat_kiriman` = '$alamat_kiriman',`tanggal_pengiriman`='$tanggal' WHERE `tb_suplie`.`id_mobil` = $id;");

if ($tb_mobil&&$tb_suplie){
//echo "Sukses";
?><script>document.location.href="gudangtabel_mobil.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}
?>
