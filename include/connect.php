<?php
$connect = mysqli_connect("127.0.0.1","root","","knygos");
mysqli_set_charset($connect, "utf8");
if (mysqli_connect_errno()){
	die ("Nepavyko prisijunti prie duomenų bazės".mysqli_connect_errno());
}
?>