<?php
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

include ('header.php');
include ("allFunctions.php");

session_start();
if(isset($_SESSION)){
	
	if ($_SESSION['type'] != 2)
	{
		redirect("index.php");
	}
}else {
	
	redirect("login.php");
}

delete("product",$_GET['id']);
echo 'Product Deleted. <a href="admin.php">Click</a> here to go back to admin'; 