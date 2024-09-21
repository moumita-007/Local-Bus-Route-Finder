<?php
  session_start();
$fusername = "";
$femail    = "";
$fmsg = ""; 
$success = "";
 $db = mysqli_connect('localhost', 'root', '', 'feedback');
if (isset($_POST['feedback'])) {
  $fusername = mysqli_real_escape_string($db, $_POST['username']);
  $femail = mysqli_real_escape_string($db, $_POST['email']);
  $fmsg = mysqli_real_escape_string($db, $_POST['message']);

  if (empty($fusername)) { array_push($errors, "Username is required"); }
  if (empty($femail)) { array_push($errors, "Email is required"); }
  if (empty($fmsg)) { array_push($errors, "Feedback is required"); }
  $query = "INSERT INTO user (username, email, message) 
          VALUES('$fusername', '$femail', '$fmsg')";
    mysqli_query($db, $query);
    $success = "Feedback Submitted Successfully!!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>feedback</title>
  <link rel="stylesheet" type="text/css" href="style.css">

    <style> 
body {
  background-image: url("images/busblur.jpg");
  background-size: cover;
 
}
</style>
</head>
<body>
  </div >
  <div class="header">
    <h2>Feedback</h2>
  </div>
  <form method="post" action="feeddback.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="">
    </div>
    <div class="input-group">
      <label>Feedback</label>
      <textarea placeholder="Feedback" name="message" rows="5" cols="55.7" required="1"></textarea>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="feedback">Submit</button>
    </div>
    <p style = "color: green">
      <?php echo $success; ?>
    </p>
    <p3>Go to <a href="index.html" style="text-decoration:none">Homepage</a> </p3> 
  </form>
</body>
</html>