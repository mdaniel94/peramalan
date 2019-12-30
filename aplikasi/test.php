<?php
include "../login/connect.php";
$es= mysql_fetch_array(mysql_query(" SELECT Harga from tb_mobil where id_mobil =2 "));
$estimasi =($es['Harga']);

echo "$estimasi";
?>