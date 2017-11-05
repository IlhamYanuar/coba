<?php
//Koneksi ke database
$server = "192.168.88.18";
$username = "root";
$password = "diy";
$database = "karantina";
 
$mysqli = new mysqli ($server, $username, $password, $database);
if (mysqli_connect_errno()) {
echo 'Koneksi gagal dilakukan dengan alasan : '.mysqli_connect_error();
exit();
mysqli_close($mysqli);
}
//Akhir Koneksi
?>
