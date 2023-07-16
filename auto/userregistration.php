<?php
session_start();
$msg = NULL;
$email_error = NULL;
$pass_error = NULL;
include 'connection.php';
include 'links.php';
if(isset($_POST['submit']))
{
    $un = $_POST['username'];
    $e = $_POST['email'];
    $p = $_POST['password'];
    $r = $_POST['user_role	'];
    $pwd = password_hash($p,PASSWORD_BCRYPT);
    $emailquery = "select * from users where email = '$e'";
    $query = mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount > 0)
    {
        $msg = "Email Already Exists";
    }
    else
    {
        $insert = "insert into users(username,email,password,user_role	) values ('$un','$e','$pwd','$r')" ; 
        $iquery = mysqli_query($con,$insert);
        if($iquery)
        {
            ?> <script>
                alert("Record Inserted successfully");
            </script>
            
            <?php
            header('location:userlogin.php');
        }
        else
        {
            ?> <script>
                alert("Record Not Inserted");
            </script>
            <?php
        }
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

			<div class="signup">
				<form method="post" action="">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<span style="color:red">
					<?php
					echo $msg;
					?>
					</span>
					<input type="password" name="password" placeholder="Password" required="">
					<select name="user_role	" id="" style="width: 60%;height: 20px;display: flex;margin:auto;border: none;outline: none;border-radius: 5px;background: #e0dede;">
						
						<option value="0">Admin</option>
						<option value="1">tester</option>
					</select>
					<button type="submit" name="submit">Sign up</button>
				</form>
			</div>
        </div>
    </body>
</html>