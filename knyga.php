<?php

include ("include/connect.php");
if (array_key_exists("id", $_GET)){
	$query = "SELECT * FROM `knygos` WHERE id = '".$_GET['id']."' LIMIT 1";
	$runQuery = mysqli_query($connect, $query);
	$result = mysqli_fetch_array($runQuery);
	$pavadinimas = $result["pavadinimas"];
	$autorius = $result["autorius"];
	$metai = $result["metai"];
	$zanras = $result["zanras"];
	$info = $result["informacija"];
	$foto = $result["foto"];
	echo $pavadinimas;
} else {
	header ("Location: index.php");
}

?>
<?php include("header.php");?>
<?php include("footer.php");?>