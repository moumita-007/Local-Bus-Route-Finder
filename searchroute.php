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
<label>Search By Route</label>
<input list="route" class="form-control form-control-sm" name="search">
<datalist id="route">
  <option value="Postogola-Jatrabari-Komolapur-Basabo-Khilgaon-Rampura-Badda-Kuril-Uttara">
  <option value="Narayangonj-Jatrabari-Basabo-Khilgaon-Rampura-Badda-kuril-Uttara-Gazipur">
  <option value="Khlgaon-Rampura-Badda-Kuril-Mirpur">
  <option value="Postogola-Jatrabari-Basabo-Khilgaon-Rampura-Badda-kuril-Uttara-Gazipur">
  <option value="Motijheel-Komolapur-Malibagh-Moghbazar-Kawran Bazar-Farmgate-Airport-Banani">
  <option value="Jatrabari-motijheel Sapla chattor-Gulistan-Paltan-press club-Shahbagh-Banglamotor-Shewrapara-Mirpur-Pallabi">
  <option value="sayedabad-ManikNogor-Komolapur-Malibagh-Moghbazar-SatRasta-Nabisco-Mohakhali-Airport-Uttara-Tongi-Gazipur">
  <option value="Azimpur-CityCollege-ScienceLab-Shahbagh-Kakrail-Malibagh-Rampura-Shahjadpur-Basundhara-Kuril-Khilkhet-Airport-Uttara-Abdullahpur">
  <option value="Sadarghat-Gulistan-Paltan-Kakrail-MAlibagh-Rampura-Badda-Shahjadpur-Notun Bazar- Basundhara-Kuril-Khilkhet-Airport-Uttara">
  <option value="Sayedabad-Maniknogor-Komolapur-rampura-Badda-Shahjadpur-Kuril-Airport-uttara-Tongi-Abdullahpur">
    <option value="Farmgate-Kawranbazar-Banglamotor-Moghbazar-Malibag-Railgate-Rampura-badda-Banasree-Meradia-Demra">

</datalist>
<input type="submit" style="background-color: black; color: white;" class="form-control form-control-sm" name="submit">
	
</form>
<br><br> <br>
<!--Search with location-->
<form method="$_GET">
<label>Search with Exact Location</label>
<input class="form-control form-control-sm" placeholder="Your Location" name="location1">
<input class="form-control form-control-sm" placeholder="Destination" name="location2">

<input class="form-control form-control-sm" type="submit" style="background-color: black; color: white;" name="submit">
  
</form>

</body>
</html>

<?php


$con = new PDO("mysql:host=localhost;dbname=testdb1",'root','');

$button = @$_GET['submit'];
$search1 = @$_GET['location1'];
$search2 = @$_GET['location2'];
$sth = $con->prepare("SELECT busname FROM bus1 NATURAL JOIN bus2 WHERE location1 = '$search1' AND location2 = '$search2' ");

   $sth->setFetchMode(PDO:: FETCH_OBJ);
   $sth -> execute();

   if($row = $sth->fetch())
   {
      ?>
      <br><br><br>
      <table>
         <tr>
            <th style="text-align-last: center;">Suitable Bus For You</th>
            
         </tr>
         <tr>
            <td><?php echo $row->busname ; 
            ?></td>
            
         </tr>


      </table>
<?php 
   }
      
      
      else{
         echo "No Bus Found Or Try Again Please!";
      }
 

?>




<!--Search with location-->


<?php

$con = new PDO("mysql:host=localhost;dbname=test",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT busname FROM `test1` WHERE destination = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Bus Name</th>
				
			</tr>
			<tr>
				<td ><?php echo $row->busname; ?></td>
				
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "No Bus Found Or Try Again Please!";
		}
    }

?>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>