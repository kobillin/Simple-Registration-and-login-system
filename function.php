<?php 
function email_exists($email, $conn)
{
	$result = mysqli_query($conn,"SELECT email FROM members WHERE email ='$email'");

	if (mysqli_num_rows($result)== 1) 
	{
		return true;
	}
	else
	{
		return false;
	}
}



function logged_in()
{
	if (isset($_SESSION['email'])) 
	{
		return true;
	}
	else
	{
		return false;
	}
}







 ?>