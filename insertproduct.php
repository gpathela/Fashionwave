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

$heading = "Insert New";
$update = 0;
if(isset($_GET['id'])){
	$result = fetchFromTable("product",$_GET['id']);
	$row = mysqli_fetch_array($result);
	$heading = "Update";
	$update = 1;
}

?>

<div id="content">
      <section id="posts" class="last clear">
      <h3><?php echo $heading; ?></h3>
      <form method="post" action="addProduct.php" id="productcreate">
      <p>Title:&emsp;<input type="text" name="title" <?php if($update == 1){ echo 'value="' . $row['title'] . '">';} ?></p>
      <p>Description:&emsp;<input type="text" name="description" <?php if($update == 1){ echo 'value="' . $row['description'] . '">';} ?></p>    
      <p>Price:&emsp;<input type="number" name="price" <?php if($update == 1){ echo 'value="' . $row['price'] . '">';} ?></p>
      <p>Category:&emsp;<input type="number" name="category" <?php if($update == 1){ echo 'value="' . $row['category'] . '">';} ?> Choose 1 for women and 2 for men</p>

      <?php if($update ==1){ ?>
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
     <?php } ?>
	
	<input type="submit" name="Submit">
      </form>

     </section>
      </div>