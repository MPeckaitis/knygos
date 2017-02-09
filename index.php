<?php

$connect = mysqli_connect("127.0.0.1","root","","knygos");
mysqli_set_charset($connect, "utf8");
if (mysqli_connect_errno()){
	die ("Nepavyko prisijunti prie duomenų bazės".mysqli_connect_errno());
}

?>

<?php include("header.php");?>
	  
	  <div class="container">
		  <h3>Knygos</h3>
		  <table class="table table-striped table-sm">
			  <thead>
				  <th>Numeris</th>
				  <th>Pavadinimas</th>
				  <th>Autorius</th>
				  <th>Metai</th>
				  <th>Žanras</th>
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
								<td>$pavadinimas</td>
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