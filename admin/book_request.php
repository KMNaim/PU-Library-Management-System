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

    if(isset($_POST['remv'])){
        $rid = $_POST['rid'];
        $rdt = $_POST['rqd'];
        mysqli_query($con,"delete from book_request where readerid = '$rid' and reqdate = '$rdt'");
    }
    if(isset($_POST['appr'])){
        $rid = $_POST['rid'];
        $rdt = $_POST['rqd'];
        mysqli_query($con,"update book_request set app = 1 where readerid = '$rid' and reqdate = '$rdt'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="naim.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Appprove Book</title>
    <style>
    td,th{
        text-align: center;
    padding:15px;
  }

  </style>
</head>
<body style="background-color:powderblue;">
<h5 style="text-align: right;color: #ff0080;font-size: 17px">Go Anywhere. Learn Anything. Read Everyday.</h5>
  <h1 style="text-align:center; color:Black; font-size: 50px">Premier University Library</h1>
  <h2 style="text-align: center; color: blue; font-size: 20px;">Center of Excellence for Quality Learning</h2>
  <h2 style="background-color:DodgerBlue;text-align:center; color:black; font-size: 50px">Book Request</h2>
<table>
    <tr>
        <th style="background-color:#ff0080">Reader Id  </th>
        <th style="background-color:#33ffad">Book Code </th>
        <th style="background-color:#ff531a"> Book Title  </th>
        <th style="background-color:#3366ff">Category</th>
        <th style="background-color:#ff0080"> Author</th>
        <th style="background-color:#ff531a"> Request Date</th>
        <th style="background-color:#33ffad"> Approve </th>
        <th style="background-color:#3366ff"> Remove </th>
        
        
    </tr>
    <?php
        $q = mysqli_query($con,"select * from book_request where app=0");
        
        while($row = mysqli_fetch_array($q)){
    ?>
    <tr> 
        <td><?php echo $row['readerid'];?></td>
        <td><?php echo $row['bookcode'];?></td>
        <td><?php echo $row['booktitle'];?></td>
        <td><?php echo $row['catagory'];?></td>
        <td><?php echo $row['author'];?></td>
        <td><?php echo $row['reqdate'];?></td>
        <td>
            <form action="book_request.php" method="post">
                <input type="hidden" name="rid" value="<?=$row['readerid'];?>">
                <input type="hidden" name="rqd" value="<?=$row['reqdate'];?>">
                <input type="submit" name="appr" value="Approve">
            </form>
        </td>
        <td>
            <form action="book_request.php" method="post">
                <input type="hidden" name="rid" value="<?=$row['readerid'];?>">
                <input type="hidden" name="rqd" value="<?=$row['reqdate'];?>">
                <input type="submit" name="remv" value="Remove">
            </form>
        </td>
        

        

    </tr>
    <?php
        }
    ?>
</table>
    
<div class="container" style="padding-top :125px;">
   
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




