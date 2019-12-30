<?php
if(empty($_SESSION['sesiid']) or empty($_SESSION['sesibagian']))
: echo "<script>alert('Can\'t Access This Page!!! <br>Silahkan login terlebih dahulu');location.href='../index.html';</script>";
  exit();
endif;
$p=mysqli_real_escape_string($db,$_GET['p']);
?>