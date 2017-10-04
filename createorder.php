<?php 
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

include ('header.php');
include ("allFunctions.php");

createOrder($_POST['quantity'], $_POST['id'], $_POST['price'], $_POST['user']);

$url = "product.php?id=" . $_POST['id'] . "&message=Order Placed Click on cart to finalize";

redirect($url);

?>