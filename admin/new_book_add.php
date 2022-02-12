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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
  <title>Add new book</title>
</head>
<body style="background-image: url(bg2.jpg);">
<h5 style="text-align: right;color: yellow;font-size: 17px">Go Anywhere. Learn Anything. Read Everyday.</h5>
  <h1 style="text-align:center; color:rgb(33, 255, 225); font-size: 50px">Premier University Library</h1>
  <h2 style="text-align: center; color: rgb(122, 255, 104); font-size: 20px;">Center of Excellence for Quality Learning</h2> <br>

  <form method="post" enctype="multiport/form-data">
<div class="container mt-4">
    <h1 class="display-4 text-center">
      <i class="fas fa-book-open text-primary"></i> <span class="text-primary">Add New Book</span></h1>
      <form id="book-form">
      <div class="form-group">
          <label style=" color:#04AA6D; font-size: 20px" for="bc"><B>Book Code</b></label>
          <input type="text" name="bc" class="form-control">
        </div>
        <div class="form-group">
          <label style=" color:#2196F3; font-size: 20px" for="bt">Book Title</label>
          <input type="text" name="bt" class="form-control">
        </div>
        <div class="form-group">
          <label style=" color:#fa7f2d; font-size: 20px" for="cat">Catagory</label>
          <input type="text" name="cat" class="form-control">
        </div>
        <div class="form-group">
          <label style=" color:#f44336; font-size: 20px" for="aut">Author</label>
          <input type="text" name="aut" class="form-control">
        </div>
        
        
        <input type="submit"  name="add"  value="Add Book" class="btn btn-primary btn-block">
        
      </form>
      <table class="table table-striped mt-5">
       
        <tbody id="book-list"></tbody>
      </table>



      <?php
        if(isset($_POST['add'])){
          $bc  = $_POST['bc'];
          $bt  = $_POST['bt'];
          $cat  = $_POST['cat'];
          $aut  = $_POST['aut'];

          $qr = mysqli_query($con,"insert into book_details values('$bc','$bt','$cat','$aut')");
	
        }
      ?>


  </div>


  <div class="container">
   
   <p>
     <a style="align:left" href="homepage.php?logout=log" class="btn btn-info btn-lg">
       <span  class="glyphicon glyphicon-log-out"></span> Log out
     </a>   <a style="align:left" href="homepage.php" class="btn btn-info btn-lg">
       <span  class="glyphicon glyphicon-log-out"></span> HOME
     </a>
     
   </p> 
   
 </div>

<div id="wrapper">
 <div id="content">

   <h2 style="text-align: center;color: rgb(33, 255, 225);font-size: 17px" > Copyright ©2011-2021 Premier University, All Rights Reserved.<br>Software Section , Department of IT,Premier University (Design & Develop).</h2>
 </div>
</div>


</body>
</html>