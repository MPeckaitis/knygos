<?php

include ("include/connect.php");
$orderBy = "id"; //default pagal ka rusiuosime
$order = "ASC"; //default rusiavimo tipas
$perPage = 4; //keli irasai turi buti viename puslapyje
$page = 1; //pradinis puslapis
$searchText = ""; //default paieskos zodis
$searchQuery = ""; //default search query
$searchVar = "";
//tikrinam ar vartotojas ka nors ivede i paieskos langeli
if (isset($_GET["st"])){
	$searchText =  $_GET["st"];
	$searchVar = "st=$searchText&";
	$searchQuery = "WHERE (`pavadinimas` LIKE '%".$searchText."%') OR (`metai` LIKE '%".$searchText."%') OR (`autorius` LIKE '%".$searchText."%') OR (`zanras` LIKE '%".$searchText."%')";
}

//tikrinam ar vartotojas paspaude ant puslaspio numeriuko
if (isset($_GET["page"])){
	$page = $_GET["page"];
}
$startFrom = ($page - 1) * $perPage; //pradine iraso db reiksme kuria naudosime LIMIT nustatyme
$query = "SELECT * FROM `knygos` $searchQuery LIMIT $startFrom, $perPage"; //default query

//nustatom kintamuju reiksmes is header linku ir rasom query su rusiavimu
if (isset($_GET["orderBy"]) && isset($_GET["order"])){
	$orderBy = $_GET["orderBy"];
	$order = $_GET["order"];
	if ($order == "ASC"){
		$order = "DESC";
	} else {
		$order = "ASC";
	}
	$query = "SELECT * FROM `knygos` $searchQuery ORDER BY ".$orderBy." ".$order." LIMIT $startFrom, $perPage";
}

?>

<?php include("header.php");?>
	  
	  <div class="container">
		  <h3>Knygos</h3>
		  <table class="table table-striped table-sm">
			  <thead id="sort-links">
				  <th><a href="?<?php echo $searchVar;?>orderBy=id&order=<?php echo $order;?>">Numeris</a></th>
				  <th><a href="?<?php echo $searchVar;?>orderBy=pavadinimas&order=<?php echo $order;?>">Pavadinimas</a></th>
				  <th><a href="?<?php echo $searchVar;?>orderBy=autorius&order=<?php echo $order;?>">Autorius</a></th>
				  <th><a href="?<?php echo $searchVar;?>orderBy=metai&order=<?php echo $order;?>">Metai</a></th>
				  <th><a href="?<?php echo $searchVar;?>orderBy=zanras&order=<?php echo $order;?>">Žanras</a></th>
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
		  if ($searchQuery == ""){
			  $query = "SELECT * FROM `knygos`";
		  } else {
			  $query = "SELECT * FROM `knygos` $searchQuery";
		  }
		  
		  $runQuery = mysqli_query($connect, $query);
		  $totalRecords = mysqli_num_rows($runQuery);
		  $totalPages = ceil($totalRecords / $perPage);
		  $linkText = ""; //kintamasis skirtas tikrinti ar yra rusiavimas ar jo nera bei ar yra paieska
			  
		  if (isset($_GET["st"])){
			  $linkText = "st=".$_GET["st"]."&"; 
		  }
			  
		  if (isset($_GET["orderBy"]) && isset($_GET["order"])){
			  $orderBy = $_GET["orderBy"];
			  $order = $_GET["order"];
			  $linkText .= "orderBy=$orderBy&order=$order&";
			  
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