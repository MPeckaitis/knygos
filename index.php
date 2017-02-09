<?php

$connect = mysqli_connect("127.0.0.1","root","","knygos");
mysqli_set_charset($connect, "utf8");
if (mysqli_connect_errno()){
	die ("Nepavyko prisijunti prie duomenų bazės".mysqli_connect_errno());
}
$query = "SELECT * FROM `knygos`";
$runQuery = mysqli_query($connect, $query);
$result = mysqli_fetch_array($runQuery);
print_r ($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">Knygų fondas <img id="logo" src="images/logo.png"></a>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="index.php">Į pradžią <span class="sr-only">(current)</span></a>
			  </li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="text" placeholder="Įveskite ieškomą frazę">
			  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Ieškoti</button>
			</form>
		  </div>
	</nav>
	  
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
				  <tr>
					  <td>1</td>
					  <td>Nauja knyga</td>
					  <td>Petras Petraitis</td>
					  <td>2001</td>
					  <td>Romanas</td>
				  </tr>
			  </tbody>
		  </table>
	  </div>

	<footer><p id="copyright">&copy; Knygų fondas 2017</p></footer>
	  
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>