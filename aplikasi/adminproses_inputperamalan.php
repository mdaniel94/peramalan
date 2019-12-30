<?php
include "../login/connect.php";

include "session.php";

$id_peramalan = $_POST['id_peramalan'];
$jenis_tipe = $_POST['jenis_tipe'];
$semester = $_POST['semester']; 
$tahun = $_POST['tahun']; 
$hasil = $_POST['hasil'];
$mape3 = $_POST['error'];

$tb_peramalan = mysql_query("INSERT INTO `tb_peramalan`(`id_peramalan`,`jenis_tipe`, `semester`, `tahun`, `hasil`,`tingkat_error`) VALUES ('$id_peramalan','$jenis_tipe','$semester','$tahun','$hasil','$mape3')");


if ($tb_peramalan){
//echo "sukses";
?>
<script>document.location.href="admininput_peramalan.php"</script><?php
}else{
$query= mysql_query("UPDATE `peramalan`.`tb_peramalan` SET `jenis_tipe`='$jenis_tipe', `semester`='$semester', `tahun`='$tahun', `hasil`='$hasil', `tingkat_error`='$mape3'  WHERE `tb_peramalan`.`id_peramalan` = '$id_peramalan';");

if ($query){
//echo "Sukses";
?><script>document.location.href="admintabel_peramalan.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}


}
?>