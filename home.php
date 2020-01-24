<?php
include("config.php");
include("function.php");

if (!logged_in() ) 
{
  header("location: login.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div class="lcontent">
<h3 class="textcenter">Home Page</h3>
<h2 style="color: green;">Welcome, <?php echo $_SESSION["fname"] ?></h2>
<button><a href="logout.php" class="anchor">Logout</a></button>
</div>
</body>
</html>










