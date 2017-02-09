<?php

include ("include/connect.php");
if (array_key_exists("id", $_GET)){
	echo $_GET["id"];
}

?>
<?php include("header.php");?>
<?php include("footer.php");?>