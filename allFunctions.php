<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
$URL = "127.0.0.1:3306";
$USER = "root";
$PASSWORD = "day@1234";
$DATABASE = "fashionwave";

//$link = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);

function connection(){

	global $URL, $USER, $PASSWORD, $DATABASE;
	//$connect = mysqli_connect($URL,$USER,$PASSWORD,$DATABASE);
    $connect = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
	if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else {
    	return $connect;
    }

}

function fetchFromTable($table,$id){
	
	$connect = connection();    	
    	$query = 'Select * from ' . $table .' where id =' . $id ;
    	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
    	if (mysqli_num_rows($result) == 1) {
    	return $result;
    }

}

function fetchLatest(){

	$connect = connection();
    	
    	$query = 'Select * from product order by id Asc limit 4'  ;
    	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
    	if (mysqli_num_rows($result) > 0) {
    	return $result;
    }


   

}

function fetchMainImage($productId){

	$connect = connection();	
    $query = 'Select name from image where product_id = ' . $productId;
    $result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
    if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    return $row['name'];
   }
}


function fetchCat($cat){

	$connect = connection();
    	
    	$query = 'Select * from product where category = ' .$cat .' order by id Asc'  ;
    	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
    	if (mysqli_num_rows($result) > 0) {
    	return $result;
    }

}


function createOrder($quantity,$id,$price,$user){

	$amount = $quantity * $price;
	$gst = $amount * .10;
	$connect = connection();
	$query = 'INSERT INTO `orders` (`user_id`, `product_id`, `quantity`, `amount`, `gst`, `status`) VALUES (' . $user . ',' . $id . ',' . $quantity . ',' . $amount . ',' . $gst . ',0)';

	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());

}


function fetchLatestOrder(){

	$connect = connection();
    	
    	$query = 'Select * from orders order by id DESC limit 1'  ;
    	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
    	if (mysqli_num_rows($result) > 0) {
    		$row = mysqli_fetch_array($result);
    		return $row;
   		}
}

function fetchAll(){

	$connect = connection();
    	
    	$query = 'Select * from product order by id DESC';
    	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
    	if (mysqli_num_rows($result) > 0) {
    	return $result;
    }

}

function delete($table,$id){
	$connect = connection();
	$query = 'delete from ' . $table .' where id =' . $id;
	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
   	return $result;
}


function updateProduct($id,$title,$description,$price,$category){
	$connect = connection();
	$query = 'UPDATE product SET title = "' . $title . '", description = "' . $description . '",price = ' . $price
				. ', category =' . $category . ' where id =' .$id;
	$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
   	return $result;

}

function insertProduct($title,$description,$price,$category){
		$connect = connection();
		$query = "Insert into product (title,description,price,category,status) values('".$title."','".$description.
				"',".$price.",".$category.",1)";
		$result = mysqli_query($connect, $query) or die($query."<br/><br/>".mysqli_error());
   		return $result;
}


?>