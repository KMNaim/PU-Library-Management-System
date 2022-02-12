<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
  
</head>

<body style ="background-image: url('bg.jpg');background-size: cover;font-family: sans-serif;
display: flex;height: 100vh;align-items: center;
justify-content: center; ">
  <div class="Register-now">
 
    <form action="signup.php" method="post" enctype="multipart/form-data" >
      
      <div class="input-style">

        <lebel for="a">Full Name</lebel>
        <input type="text" placeholder="Full Name" id="a" name="name">


        <lebel for="c">Your Email</lebel>
        <input type="email" placeholder="Example@gmail.com" id="c" name="email">

        <lebel for="d">Phone Number</lebel>
        <input type="text" placeholder="Phone Number" id="d" name="number">

        <lebel for="b">Date of Birth</lebel>
        <input type="date" placeholder="dob" id="b" name="dob">

        <lebel for="e">Your Password</lebel>
        <input type="password" placeholder="Password" id="e" name="password">

        <lebel for="f">Confirm Password</lebel>
        <input type="password" placeholder="Confirm Password" id="f" name="cpassword">
      </div>

      <div class="gender">
        <p>Gender</p>
        <div class="option">
          <input type="radio" id="aa" value="Male" name="gend">
          <label for="aa">Male</label>

          <input type="radio" id="bb" value="Female" name="gend">
          <label for="bb">Female</label>

          <input type="radio" id="cc" value="Others" name="gend" checked >
          <label for="cc">Others</label>

          <br><br>
        </div>
        <div class="col-25">
        <label for="image"  > Insert Image  </label>
        <input type="file" id="image" name="image"> <br>

        </div>
      </div>

      <div class="register-page">

        <input type="submit" value="Sign Up" name="signup" >

        <p style="text-align: center;text-decoration:none;">Already have an account?
        <a style="text-align: center;text-decoration:none;" href="login.php"> Log in</a>

      </div>

    </form>
  </div>

  </div>

</body>

</html>

<?php
include("connection.php");


if(isset($_POST['signup'])) 
{
  
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['number'];
	$dob = $_POST['dob'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
	$gender = $_POST['gend'];
 
  
	//Reader id generation
	$num=rand(10,100);
	$R_ID="R-".$num;

 // Image Input 
  $ext = explode(".",$_FILES['image']['name']);
  $c = count($ext);
  $ext = $ext[$c-1];
  $date = date("D:M:Y");
  $time = date("h:i:s");
  $image_name = md5($date.$time.$ext);
  $image = $image_name.".".$ext;

	$query= "insert into readers values('$R_ID','$name','$email','$mobile','$dob','$pass','$image','$gender')";

	if(mysqli_query($con,$query) and $email != null ){

    $image_tmp = $_FILES['image']['tmp_name'];
    if($image != null ){
        move_uploaded_file($image_tmp,"uploadedimage/".$image);
    }
  }
	else{
		echo "error!".mysqli_error($con);
	}

}


?>