<?php
include "../login/connect.php";

$idpelanggan = $_POST['idpelanggan']; 
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

if ($jenis == Cash){
$verifikasi=1;
}else if ($jenis == Credit){
$verifikasi=0;
}


$hasil = mysql_query("UPDATE `tb_pelanggan` SET `nama`='$nama',`no_ktp`='$no',`alamat_tinggal`='$alamat',`no_telepon`='$notlpn',`pekerjaan`='$pekerjaan',`pendapatan`='$pendapatan' WHERE id_pelanggan = '$idpelanggan'");

$hasil2 = mysql_query("UPDATE `tb_pemesanan` SET `tanggal_pemesanan`='$tanggal',`jenis_pemesanan`='$jenis',`verifikasi`='$verifikasi' WHERE id_pemesanan = '$idpemesanan'");

if ($hasil && $hasil2){
//echo "Sukses";
?><script>document.location.href="tabelpensiun.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}
?>
