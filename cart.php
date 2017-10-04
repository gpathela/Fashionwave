<?php 
include ('header.php');
include ("allFunctions.php");
$result = fetchLatestOrder();
$product = fetchFromTable("product",$result['product_id']);
$item = mysqli_fetch_array($product);
$image = fetchMainImage($item['id']);
 
?>

<<div id="content">
      <section id="posts" class="last clear">
      <h3><?php echo $item['title']?></h3>
        <dl>
          <li>
            <article class="clear">
              <figure><img src="images/products/<?php echo $image ?>" alt="<?php echo $item['title']?>">
                </figure>
            </article>
          </li>
          
        </dl>
      </section>
    </div>
    <!-- right column -->
    <aside id="right_column">
      <h2 class="title">Your Order</h2>

      <h1><h2>Price = $<?php echo $item['price']?></h1>
      <p><h2>Quantity = <?php echo $result['quantity'] ?></h2></p>
      <p><h2>Total Amount = <?php echo $result['amount'] ?></h2></p>
      <p><h2>Include GST = <?php echo $result['gst'] ?></h2></p>
      <form action="" method="POST">
      <p><input type="submit" value="Confirm Order"></p>      
      </form>
	  <p><b>
      <?php if(isset($_GET['message'])) {
      	echo $_GET['message'];
      	echo "<br><br>";
      	echo '<a href="cart.php"><img src="images/cart.png" width="200" height="100"></a>';
      		}
      ?></b></p>

      <nav>
        
      </nav>
      <!-- /nav -->
    </aside>
    <!-- / content body -->
  </div>


 <?php include ('footer.php'); ?>