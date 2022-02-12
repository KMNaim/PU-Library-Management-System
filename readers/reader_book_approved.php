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
    $us = $_SESSION['user_id'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Approved Books</title>
  <style>
    td,th{
    padding:10px;
text-align: center;
  }

  </style>
</head>
<body style="background-color:powderblue;">
<h5 style="text-align: right;color: blue;font-size: 17px">Go Anywhere. Learn Anything. Read Everyday.</h5>
  <h1 style="text-align:center; color:Black; font-size: 50px">Premier University Library</h1>
  <h2 style="text-align: center; color: blue; font-size: 20px;">Center of Excellence for Quality Learning</h2>
  <h2 style="background-color:DodgerBlue;text-align:center; color:black; font-size: 50px">Approved Books</h2>
  
  


  <table>
    <tr>
        <th style="background-color:#ff0080">Reader Id </th>
        <th style="background-color:#33ffad">Book Code</th>
        <th style="background-color:#ff531a">Book Title</th>
        <th style="background-color:#3366ff">Category</th>
        <th style="background-color:#ff0080">Author</th>
        <th style="background-color:#33ffad">Request Date</th>
        
    </tr>
    <?php
        $q = mysqli_query($con,"select * from book_request where app=1 and readerid = '$us'");
        
        while($row = mysqli_fetch_array($q)){
    ?>
    <tr> 
        <td><?php echo $row['readerid'];?></td>
        <td><?php echo $row['bookcode'];?></td>
        <td><?php echo $row['booktitle'];?></td>
        <td><?php echo $row['catagory'];?></td>
        <td><?php echo $row['author'];?></td>
        <td><?php echo $row['reqdate'];?></td>
        
        

        

    </tr>
    <?php
        }
    ?>
</table>













  <div class="container" style="padding-top :250px;">
   
      <p>
        <a style="align:center" href="homepage.php?logout=log" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>   <a style="align:left" href="homepage.php" class="btn btn-info btn-lg">
       <span  class="glyphicon glyphicon-log-out"></span> HOME
     </a>
      </p> 
      
  </div>


<div id="wrapper">
    <div id="content">
  
      <h2 style="text-align: center;color: #ff0080;font-size: 17px" > Copyright ©2011-2021 Premier University, All Rights Reserved.<br>Software Section , Department of IT,Premier University (Design & Develop).</h2>
    </div>
  </div>
</body>
</html>