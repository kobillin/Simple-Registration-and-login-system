<?php
include("config.php");
include("function.php");

$fname ="";
$lname ="";
$email ="";
 if (isset($_POST['register'])) {

    $fname = $_POST['fname']; 
    $lname = $_POST['lname']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $cpassword = $_POST['cpassword']; 

    if (strlen($password)<4) 
  {
    $error ="Your password is too short";
  }
  else if(email_exists($email, $conn))
  {
    $error ="This email is already registered with another user";
  }


   else if ($password != $cpassword) {
    
    echo '<script type="text/javascript">';
    echo 'alert("Your password did not match")';
    echo '</script>';
   }else{
     // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO members(fname, lname, email, password)
    VALUES ('$fname', '$lname', '$email', '$password');";
    mysqli_query($conn, $sql);

    echo '<script type="text/javascript">';
    echo 'alert("Registration was successfull, You can now login")';
    echo '</script>'; 

   // echo $firstName;
   }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div class="content">
<h3 class="textcenter">Register Here</h3>

  <form action="index.php" method="post">

    <label >First Name:</label>
    <input type="text" id="fname" class="myInput" 
    name="fname" required placeholder="Enter Your First Name.."  value="<?php echo "$fname"; ?>" ><br><br>

    <label>Last Name:</label>
    <input type="text" id="lname" class="myInput"
     name="lname" required placeholder="Enter Your Last Name.." value="<?php echo "$lname"; ?>"><br><br>

    <label> Email:</label>
    <input type="email" id="email" class="myInput"
     name="email" required placeholder=" Enter Your email address" value="<?php echo "$email"; ?>"><br><br>
<label>Password:</label>
    <input type="password" class="myInput" id="password"
     name="password" required><br><br>

    <label>Confirm Password:</label>
    <input type="password" class="myInput" id="cpassword"
     name="cpassword" required><br><br>

    <input type="submit" class="submit" name="register" value="Register"><br>
  </form>
   <h4 class="textcenter">
   Already Registered <a href="login.php" class="anchor">Login</a>
  <a href="home.php" class="anchor"></a></h4>
</div>
</body>
</html>










