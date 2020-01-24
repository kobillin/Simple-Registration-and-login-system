<?php
include("config.php");
include("function.php");

if (logged_in() ) 
{
    header("location: home.php");
    exit();
}
$error ="";
$email ="";
if (isset($_POST['login']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (email_exists($email, $conn)) 
  {
      // 
      // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      $result =mysqli_query($conn, "SELECT password FROM members WHERE email='$email'");
      $retrievepassword = mysqli_fetch_assoc($result);

      if (($password)!==$retrievepassword['password'] )
      {
        $error = "Password is incorrect";
      }
      else
      {
        // $error ="Password is correct";  
        $_SESSION['email'] = $email;
        // $_SESSION['fname'] = $fname;
        header("location: home.php");
      }

    

  }
  else
  {
    $error = "Email Does not Exists";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div class="lcontent">
<h3 class="textcenter">Login Here</h3>
 <div id="error" style=" <?php if ($error !=""){ ?> display: block; <?php  } ?>"> <?php echo $error; ?> </div>

  <form action="login.php" method="post">


    <label for="email"> Email:</label>
    <input type="email" id="email" class="myInput"
     name="email" required placeholder=" Enter Your email address" value="<?php echo "$email"; ?>"><br><br>
<label for="password">Password:</label>
    <input type="password" class="myInput" id="password"
     name="password" required><br><br>

    <input type="submit" class="submit" name="login" value="Login"><br>
  </form>
   <h4 class="textcenter">
   Not Yet Registered <a href="index.php" class="anchor">Register</a></h4>
</div>
</body>
</html>










