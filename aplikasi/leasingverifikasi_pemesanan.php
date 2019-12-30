<?php
include "../login/connect.php";
$id_pemesanan = $_GET['id_pemesanan'];
$a=1;
$baris= mysql_fetch_array(mysql_query(" SELECT * FROM tb_pemesanan where id_pemesanan = '$id_pemesanan'")); 
$id_mobil =($baris['id_mobil']);
$baris2= mysql_fetch_array(mysql_query(" SELECT * FROM tb_mobil where id_mobil = '$id_mobil'"));
$harga =($baris2['harga']);
$proses = $harga*0.1;
$total =$harga+$proses;
$tanggal=date("Y-m-d");

$tb_pemesanan = mysql_query("UPDATE `tb_pemesanan` SET `verifikasi`='$a' WHERE `id_pemesanan` = '$id_pemesanan'");

$tb_penjualan = mysql_query("INSERT INTO `$database`.`tb_penjualan` 
(`id_pemesanan`,`id_mobil`, `tgl_penjualan`, `total_harga`) VALUES 
('$id_pemesanan','$id_mobil', '$tanggal', '$total')");

if ($tb_pemesanan && $tb_penjualan){
//echo "Sukses";
?><script>document.location.href="leasingtabel_pemesanan.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}

?>
