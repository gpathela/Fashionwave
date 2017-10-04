<?php 
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
include ("allFunctions.php");

$result = fetchFromTable("user", $_POST["uname"]);
$url = "";

if (mysqli_num_rows($result) == 1) {
    		$row = mysqli_fetch_array($result);
      		
      		if ($row['password'] == $_POST["psw"]){
      			session_start();
      			$_SESSION["user"] = $row['username'];
      			if($row['type'] == 2){
      				echo "Inside admin part";
      				$url = "admin.php";
      				$_SESSION['type'] = 2;
      			}else {
      				$_SESSION['type'] = 1;
      				$url = "index.php";
      			}

      			redirect($url);
      		}
}else if(mysqli_num_rows($result) == 0){
      		echo "No user found";
}else {
  		echo mysqli_error($result);
  
	}





 ?>