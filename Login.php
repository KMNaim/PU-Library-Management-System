<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
<title>Login form</title>
<link rel="stylesheet" href="main.css">
</head>
<body style="background-image: url(bg.jpg);">
  <h5 style="text-align: right;color: yellow;font-size: 17px">Go Anywhere. Learn Anything. Read Everyday.</h5>
  <h1 style="text-align:center; color:rgb(33, 255, 225); font-size: 50px">Premier University Library</h1>
  <h2 style="text-align: center; color: rgb(122, 255, 104); font-size: 20px;">Center of Excellence for Quality Learning</h2>
  <form class="box" method="POST" enctype="multipart/form-data">
    <h1 style="text-align: center;">STUDENT LOGIN</h1>
    
      <b>

      <label for="text" style="text-align: left; margin-left: 40px;">USER ID:</label>
      <input type="text" id="text" name="id" placeholder="Your Full ID">
      
      <label for="pass" style="text-align: left; margin-left: 40px;">Password:</label><br>
      <input type="password" id="pass" name="pass" placeholder="Password"><br> </b>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-left: 40px"> Remember me
      </label>
    
      <br>
      <p>
      <a style="text-align: center;margin-left: 33%;text-decoration:none;" href="forgot pass.html">Forgot    Your  Password?</a></p>
      <input type="submit" name="login" value="Log in" style="width: 85%;text-align: center ;margin-left:8%"> <br><br>  
      <p style="text-align: center;text-decoration:none;">Don't have an account?
      <a style="text-align: center;text-decoration:none;" href="signup.php">Register</a></p>
  
  </form>
</body>
</html>


<?php
include("connection.php");


if(isset($_POST['login']))
{

  $id=$_POST['id'];
	$pass=$_POST['pass'];

	$sql="select * from admin where userid='$id' and password='$pass'";
  $sq="select * from  readers where READER_ID='$id' and PASSWORD='$pass'";
            
            $r=mysqli_query($con,$sql);
            $q=mysqli_query($con,$sq);

            if(mysqli_fetch_assoc($q))
            {
                $_SESSION['user_id']=$id;
                $_SESSION['login_status']="loged in";
                header("Location:readers/homepage.php");
            }
            else if(mysqli_fetch_assoc($r))
            {
                $_SESSION['user_id']=$id;
                $_SESSION['login_status']="loged in";
                header("Location:admin/homepage.php");
            }
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
	
}
?>