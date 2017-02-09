<?php

include ("include/connect.php");
$orderBy = "id"; //default pagal ka rusiuosime
$order = "ASC"; //default rusiavimo tipas
$perPage = 2; //keli irasai turi buti viename puslapyje
$page = 1; //pradinis puslapis

//tikrinam ar vartotojas paspaude ant puslaspio numeriuko
if (isset($_GET["page"])){
	$page = $_GET["page"];
}
$startFrom = ($page - 1) * $perPage; //pradine iraso db reiksme kuria naudosime LIMIT nustatyme
$query = "SELECT * FROM `knygos` LIMIT $startFrom, $perPage"; //default query

//nustatom kintamuju reiksmes is header linku ir rasom query su rusiavimu
if (isset($_GET["orderBy"]) && isset($_GET["order"])){
	$orderBy = $_GET["orderBy"];
	$order = $_GET["order"];
	if ($order == "ASC"){
		$order = "DESC";
	} else {
		$order = "ASC";
	}
	$query = "SELECT * FROM `knygos` ORDER BY ".$orderBy." ".$order." LIMIT $startFrom, $perPage";
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
				  
				  	//uzpildom lentele su irasais is duomenu bazes
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
		  <div id="pages">
		  <?php
		  //skaiciuojam kiek puslapiu bus is viso
		  $query = "SELECT * FROM `knygos`";
		  $runQuery = mysqli_query($connect, $query);
		  $totalRecords = mysqli_num_rows($runQuery);
		  $totalPages = ceil($totalRecords / $perPage);
		  $linkText = ""; //kintamasis skirtas tikrinti ar yra rusiavimas ar jo nera
		  if (isset($_GET["orderBy"]) && isset($_GET["order"])){
			  $orderBy = $_GET["orderBy"];
			  $order = $_GET["order"];
			  $linkText = "orderBy=$orderBy&order=$order&";
		  }
		  
		  if ($page != 1){
			  echo "<a href='?".$linkText."page=".($page - 1)."'>Atgal </a>";
		  }
		  for ($i=1; $i<=$totalPages; $i++){
			  if ($page == $i){
				  echo "<a class='active'href='?".$linkText."page=".$i."'>".$i." </a>";
			  } else {
			  echo "<a href='?".$linkText."page=".$i."'>".$i." </a>";
			  }
		  }
		  if ($page != $totalPages){
			  echo "<a href='?".$linkText."page=".($page + 1)."'> Pirmyn</a>";
		  }
		  ?>
		  </div>
	  </div>

<?php include("footer.php");?>