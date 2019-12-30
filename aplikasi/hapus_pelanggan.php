<?php
include "../login/connect.php";

$id = $_GET['id_pelanggan'];

$hasil1 = mysql_query("DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id'");

if ($hasil1){//jika berhasil
//echo  Berhasil dihapus";
?><script>document.location.href="tabelpensiun.php"</script><?php
}else{//jika  gagal menghapus
echo "Gagal : ".mysql_error();
}
?>
