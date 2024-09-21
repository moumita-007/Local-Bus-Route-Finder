<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Local Bus Route </title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcu-icon" type="text/css" href="images/piroll.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style> 
body {
  background-image: url("images/busblur.jpg");
  background-size: cover;
 
}
</style>
</head>
<body>

  <!---Navbar-->
    <nav class="navbar navbar-expand-sm navbar-light mb-0">
        <div class="container py-4">
            <a class="navbar-brand"  href="#"><img src="images/logo.png">Local Bus Route</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="maps.html">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="searchbus.php">Search Bus</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="searchroute.php">Search Route</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="feeddback.php">Feedback</a>
                  </li>
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Log-in/Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
	</nav>
	<br><br>

<form method="post">
<label >Search by Busname</label>
<input type="text" class="form-control form-control-sm" name="search">
<input type="submit" class="form-control form-control-sm" style="background-color: black; color: white;" name="submit">
	
</form>
<?php

$con = new PDO("mysql:host=localhost;dbname=test",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `test1` WHERE BUSNAME = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Bus Name</th>
				<th>Bus Routes</th>
			</tr>
			<tr>
				<td><?php echo $row->busname; ?></td>
				<td><?php echo $row->destination; ?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "No Bus Found Or Try Again Please!";
		}
    }

?>

<br><br><br><br><br><br>

<

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>

