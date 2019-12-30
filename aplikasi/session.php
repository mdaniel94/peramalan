<?php
$user= mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id = $_SESSION[username]")); 
$nama =($user['nama']); 
$bagian =($user['bagian']);
$id =($user['id']);  
?>