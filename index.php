<?php 
include ('header.php');
include ("allFunctions.php");


$result = fetchLatest();
$r1 = mysqli_fetch_array($result);
$image1 = fetchMainImage($r1['id']);
$r2 = mysqli_fetch_array($result);
$image2 = fetchMainImage($r2['id']);
$r3 = mysqli_fetch_array($result);
$image3 = fetchMainImage($r3['id']);
#$r4 = mysqli_fetch_array($result);
#$image4 = fetchMainImage($r4['id']);

?>

    <!-- main content -->
    <div id="homepage">
      <!-- services area -->
      <section id="services" class="clear">
      <h2>Latest</h2>
      <br>
        <article class="one_quarter">
        <h6><?php echo $r1['title'] ?></h6>
              
          <p><a href="product.php?id=<?php echo $r1['id'] ?>"><img src="images/products/<?php echo $image1 ?>"></a></p>
          <p class=>$<?php echo $r1['price'] ?></p>
        </article>
        
        <article class="one_quarter">
        <h6><?php echo $r2['title'] ?></h6>
              
          <p><a href="product.php?id=<?php echo $r2['id'] ?>"><img src="images/products/<?php echo $image2 ?>"></a></p>
          <p class=>$<?php echo $r2['price'] ?></p>
        </article>

        <article class="one_quarter">
        <h6><?php echo $r3['title'] ?></h6>
              
          <p><a href="product.php?id=<?php echo $r3['id'] ?>"><img src="images/products/<?php echo $image3 ?>"></a></p>
          <p class=>$<?php echo $r3['price'] ?></p>
        </article>


      </section>
      
      
    </div>
    

<?php include ('footer.php'); ?>
