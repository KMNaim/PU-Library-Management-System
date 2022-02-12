<?php
    session_start();
    include("../connection.php");
    if ( isset($_SESSION['user_id']) and $_SESSION['login_status'] == true  ){
        
        if( @$_GET['logout'] == true ){
            session_destroy();
            header('location:../Login.php');
        }
    }
    else header('location:../Login.php');
?>




<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="changepass.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>

  <h1 style="text-align:center; color:rgb(33, 255, 225); font-size: 50px">Premier University Library</h1>
  
<body style="background-image: url(bg2.jpg);">
    <form  method="post">
     	<h2>Change Password</h2>
     	

     	<label><b>Old Password</b></label>
     	<input type="password" name="opass" placeholder="Old Password">
     	       <br>

     	<label><b>New Password</b></label>
     	<input type="password" 
     	       name="npass" 
     	       placeholder="New Password">
     	       <br>

     	<label><b>Confirm New Password</b></label>
     	<input type="password" 
     	       name="cpass" 
     	       placeholder="Confirm New Password">
     	       <br>

     	<button type="submit" name="sub" >CHANGE</button>
       <p>
     <a style="align:left" href="homepage.php?logout=log" class="btn btn-info btn-lg">
       <span  class="glyphicon glyphicon-log-out"></span> Log out
     </a>   <a style="align:left" href="homepage.php" class="btn btn-info btn-lg">
       <span  class="glyphicon glyphicon-log-out"></span> HOME
     </a>
     
   </p>
          
     </form>
</body>
</html>



<?php
if(isset($_POST['sub']))
{
    $userid= $_SESSION['user_id'];
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
    $cpass=$_POST['cpass'];
  if($npass==$cpass)
  {
    

  $sql="SELECT  * FROM admin WHERE password='$opass' and userid='$userid'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>0)
    {
       $sql1="UPDATE admin SET password ='$npass' WHERE userid='$userid'"; 
       if(mysqli_query($con,$sql1))
       {
         echo "Password Changed Successfully!";
       }  
    }
  else
  {
    echo "Old password does not match";
  }
  }
    else
    {
        echo "New password does not match with Confirm password";
    }
}

?>