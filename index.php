<?php

include ("include/connect.php");
$orderBy = "id";
$order = "ASC";
$query = "SELECT * FROM `knygos`";

if (isset($_GET["orderBy"]) && isset($_GET["order"])){
	$orderBy = $_GET["orderBy"];
	$order = $_GET["order"];
	if ($order == "ASC"){
		$order = "DESC";
	} else {
		$order = "ASC";
	}
	$query = "SELECT * FROM `knygos` ORDER BY ".$orderBy." ".$order;
}

?>

<?php include("header.php");?>
	  
	  <div class="container">
		  <h3>Knygos</h3>
		  <table class="table table-striped table-sm">
			  <thead id="sort-links">
				  <th><a href="?orderBy=id&order=<?php echo $order;?>">Numeris</a></th>
				  <th><a href="?orderBy=pavadinimas&order=<?php echo $order;?>">Pavadinimas</a></th>
				  <th><a href="?orderBy=autorius&order=<?php echo $order;?>">Autorius</a></th>
				  <th><a href="?orderBy=metai&order=<?php echo $order;?>">Metai</a></th>
				  <th><a href="?orderBy=zanras&order=<?php echo $order;?>">Žanras</a></th>
			  </thead>
			  <tbody>
				  <?php
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