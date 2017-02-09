<?php

include ("include/connect.php");
$orderBy = "id";
$order = "ASC";
$query = "SELECT * FROM `knygos`";

if (isset($_GET["orderBy"]) && isset($_GET["order"])){
	$orderBy = $_GET["orderBy"];
	$order = $_GET["order"];
	echo $orderBy .$order;
}

?>

<?php include("header.php");?>
	  
	  <div class="container">
		  <h3>Knygos</h3>
		  <table class="table table-striped table-sm">
			  <thead id="sort-links">
				  <th><a href="?orderBy=id&order=ASC">Numeris</a></th>
				  <th><a href="?orderBy=pavadinimas&order=ASC">Pavadinimas</a></th>
				  <th><a href="?orderBy=autorius&order=ASC">Autorius</a></th>
				  <th><a href="?orderBy=metai&order=DESC">Metai</a></th>
				  <th><a href="?orderBy=zanras&order=ASC">Žanras</a></th>
			  </thead>
			  <tbody>
				  <?php
				  	$query = "SELECT * FROM `knygos`";
					$runQuery = mysqli_query($connect, $query);
					while ($result = mysqli_fetch_array($runQuery)){
						$id = $result["id"];
						$pavadinimas = $result["pavadinimas"];
						$metai = $result["metai"];
						$autorius = $result["autorius"];
						$zanras = $result["zanras"];
						echo "<tr>
								<td>$id</td>
								<td><a href='knyga.php?id=$id'>$pavadinimas</a></td>
								<td>$autorius</td>
								<td>$metai</td>
								<td>$zanras</td>
							  </tr>";
					}
				  ?>
			  </tbody>
		  </table>
	  </div>

<?php include("footer.php");?>