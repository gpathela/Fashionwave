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

$update = 0;
if(isset($_POST['id'])){
	$result = updateProduct($_POST['id'],$_POST['title'],$_POST['description'],$_POST['price'],$_POST['category']);
}else {
	$result = insertProduct($_POST['title'],$_POST['description'],$_POST['price'],$_POST['category']);
}

echo 'Product Inserted/Updated. <a href="admin.php">Click</a> here to go back to admin'; 
