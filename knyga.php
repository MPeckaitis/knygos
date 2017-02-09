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
} else {
	header ("Location: index.php");
}
?>

<?php include("header.php");?>

	<div class="container">
		<div id="viena-knyga">
		<img id="book-img" src="images/knygos/<?php echo $foto;?>">
		<h3><?php echo $pavadinimas;?></h3>
		<table>
			<tr>
				<td class="antrastes-spalva">Autorius:</td>
				<td><?php echo $autorius;?></td>
			</tr>
			<tr>
				<td class="antrastes-spalva">Leidimo metai:</td>
				<td><?php echo $metai;?></td>
			</tr>
			<tr>
				<td class="antrastes-spalva">Žanras:</td>
				<td><?php echo $zanras;?></td>
			</tr>
		</table>
		</div>
		<hr>
		<p><?php echo $info;?></p>
	</div>

<?php include("footer.php");?>