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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="userhome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
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
  <h2 style="background-color:DodgerBlue;text-align:center; color:black; font-size: 50px">All Reader List</h2>
      


  <table>
  <tr> 
    <th style="background-color:#ff0080"> Reader ID</th>
    <th style="background-color:#33ffad">Reader Name</th>
    <th style="background-color:#ff531a">Gender</th>
    <th style="background-color:#3366ff">Email</th>
    <th style="background-color:#ff0080">Number</th>
  </tr>
  
 
    <?php 
      $r = mysqli_query($con,"select * from readers");
      while($row = mysqli_fetch_array($r)){
    ?><tr>
      <td><?php echo $row['READER_ID'];?></td>
      <td><?php echo $row['READER_NAME'];?></td>
      <td><?php echo $row['GENDER'];?></td>
      <td><?php echo $row['EMAIL'];?></td>
      <td><?php echo $row['NUMBER'];?></td>
      </tr>
    
    <?php
      }
    ?>
</table>
<br><br>
<div class="container">
   
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
  
      <h2 style="text-align: center;color: red;font-size: 17px" > Copyright ©2011-2021 Premier University, All Rights Reserved.<br>Software Section , Department of IT,Premier University (Design & Develop).</h2>
    </div>
  </div>
  </body>
</html>