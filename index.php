<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">

   <style> 
body {
  background-image: url("images/busblur.jpg");
  background-size: cover;
 
}
</style>
</head>
<body>

<div class="header">
	 <h2>Home Page</h2>
</div>
<div class="content">
  	
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

  
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p style="
      font-family: poppins;">Hello, You are logged in as <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: black;">logout</a> </p>
      <p> Or go to </p> <a href="index.html" class="active" style="text-decoration: none"; >Homepage</a>
    <?php endif ?>
</div>
		
</body>
</html>