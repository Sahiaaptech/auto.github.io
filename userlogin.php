<?php
session_start();
$msg = NULL;
$email_error = NULL;
$pass_error = NULL;
include 'connection.php';
include 'links.php';
if(isset($_POST['login']))
{
	$Email = $_POST['email'];
	$Password = $_POST['password'];
	$emailsearch="select * from users where email= '$Email' ";
	$result =mysqli_query($con,$emailsearch);
	$email_count = mysqli_num_rows($result);
		if($email_count)
		{
			$email_pass = mysqli_fetch_array($result);
			$db_pass = $email_pass['password'];
			$pass_decode = password_verify($Password,$db_pass);
			if($pass_decode)
			{
				$_SESSION['username'] = $email_pass['username'];
				$_SESSION['user_role'] = $email_pass['user_role'];
				if(isset($_POST['rememberme']))
				{
					setcookie('emailcookie',$Email,time()+86400); 
					setcookie('passcookie',	$Password,time()+86400); 
					header('location:tests.php');
				}
				else
				{
					header('location:tests.php');
				}
			
			}
			else
			{
				$pass_error= "Incorrect Password";
			}
		}
		else
		{
			$email_error = "Incorrect Email";
		}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
        <div class="login">
				<form method="post" action="">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="" value="<?php
					if(isset($_COOKIE['emailcookie']))
					{
						echo $_COOKIE['emailcookie'];
					}
					?>"> 
					<span style="color:red">
							<?php echo $email_error ?>
					</span>

					<input type="password" name="password" placeholder="Password" required="" value="<?php
					if(isset($_COOKIE['passcookie']))
					{
						echo $_COOKIE['passcookie'];
					}
					?>"> 
					<span style="color:red">
							<?php echo $pass_error ?>
					</span>
					<center>	
						<table>
							<tr>
								<td><input type="checkbox" name="rememberme"></td>
								<td>Remember Me</td>
							</tr>
						</table>
					</center>

				
					<button type="submit" name="login">Login</button>
				</form>
			</div>
        </div>
    </body>
</html>
