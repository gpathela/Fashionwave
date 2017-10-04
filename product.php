<?php 
include ('header.php');
include ("allFunctions.php");

$result = fetchFromTable("product", $_GET['id']);
$row = mysqli_fetch_array($result);
$image = fetchMainImage($row['id']);
?>

<div id="content">
      <section id="posts" class="last clear">
      <h3><?php echo $row['title']?></h3>
        <dl>
          <li>
            <article class="clear">
              <figure><img src="images/products/<?php echo $image ?>" alt="<?php echo $row['title']?>">
                
                  <p><?php echo $row['description'] ?></p>
                  <footer class="more"><a href="">Buy &raquo;</a></footer>
                
              </figure>
            </article>
          </li>
          
        </dl>
      </section>
    </div>
    <!-- right column -->
    <aside id="right_column">
      <h2 class="title">Buy Now</h2>

      <h1>$<?php echo $row['price']?></h1>
      <?php
      $user = 0;
      if(isset($_SESSION)){$user = $_SESSION['user'];}
      ?>
      <br>
      <form action="createorder.php" method='Post'>
      <p><h2>Quantity</h2></p>
      <p><input type="number" name="quantity"></p>
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
      <input type="hidden" name="user" value="<?php echo $user ?>">
      <p><input type="submit" value="Add to Cart"></p>      
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
