<?php include ('header.php'); ?>

<div id="homepage">
<br><br>
<form action="loginProcess.php" method="Post">
  
  <div class="container">
	<label><b>For admin :  Username: 1 and Password: 1</b></label><br>
	<label><b>For Customer :  Username: 2 and Password: 2</b></label><br><br>

    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    
  </div>

  
</form>
<br><br>
</div>

<?php include ('footer.php'); ?>