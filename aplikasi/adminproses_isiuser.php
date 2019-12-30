<?php
error_reporting(0);
include "../login/connect.php";
$id= $_POST['id'];
$nama= $_POST['nama'];
$username= $_POST['username'];  
$password = $_POST['password']; 
$Bagian = $_POST['bagian'];
$nip = $_POST['nip'];


//script untuk upload
$nama_gambar=$_FILES['file']['name'];
$uploaddir='foto/';
$alamatfile=$uploaddir.$nama_gambar;
if (move_uploaded_file($_FILES['file']['tmp_name'],$alamatfile)){
$query = mysql_query("INSERT INTO `user`(`id`, `nama`, `username`, `password`, `bagian`, `nip`,`foto`) VALUES ('$id','$nama','$username',md5('$password'),'$Bagian','$nip','$alamatfile')");

}
if(!$query){
?>
<script>
alert('Terjadi kesalahan sistem saat input data!');
document.location.href="admininput_user.php";
</script><?php
}else{
?>
<script>document.location.href="lihat_guru.php"</script><?php
}
	
?>