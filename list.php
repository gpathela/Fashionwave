<?php 
include ('header.php');
include ("allFunctions.php");
$cat = 0;

if(isset($_GET['cat'])){
	if($_GET['cat'] == 'men'){
		$cat = 2;
	}else if($_GET['cat'] == 'women'){
		$cat = 1;
	}
	
	$result = fetchCat($cat);
}else {
	
	$result = fetchAll();
}
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
        </article>
		
     <?php } ?>

     </section>
 </div>

 <?php include ('footer.php'); ?>
