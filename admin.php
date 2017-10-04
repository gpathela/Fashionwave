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

$result = fetchAll();
?>

<div id="homepage">
      <!-- services area -->
      <section id="services" class="clear">
      <h2><?php if(isset($_GET['cat'])){echo $_GET['cat'];} else { echo "All";} ?></h2>
      <br>

      <?php 

      while($row = mysqli_fetch_array($result)){
      	$image = fetchMainImage($row['id']); ?>

      	<article class="one_quarter">
        <h6><?php echo $row['title'] ?></h6>
              
          <p><a href="product.php?id=<?php echo $row['id'] ?>"><img src="images/products/<?php echo $image ?>"></a></p>
          <p class=>$<?php echo $row['price'] ?></p>
          <p><a href="delete.php?id=<?php echo $row['id'] ?>"><img src="images/delete.png" width="30" height="20"></a>
			 <a href="insertproduct.php?id=<?php echo $row['id'] ?>"><img src="images/update.png" width="40" height="20"></a>

          </p>
        </article>
		
     <?php } ?>

     </section>
 </div>

 <?php include ('footer.php'); ?>
