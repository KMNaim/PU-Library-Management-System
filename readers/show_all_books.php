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
    $id = $_SESSION['user_id'];

    if (isset($_POST['read'])){
      $bc = $_POST['bc'];
      $bt = $_POST['bt'];
      $cat = $_POST['cat'];
      $aut = $_POST['aut'];

      mysqli_query($con,"insert into book_request(readerid	,bookcode,	booktitle	,catagory	,author	) values ('$id','$bc','$bt','$cat','$aut')");

    }
?>

<!DOCTYPE html>
<head>
  <title>Available Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="naim.css">
  <link rel="stylesheet" href="css/all.css">
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
  <h2 style="background-color:DodgerBlue;text-align:center; color:black; font-size: 50px">Available Books</h2>
<body>
<br><br>
<table>
  <tr> 
    <th style="background-color:#ff0080"> Book Code</th>
    <th style="background-color:#33ffad">Book Title</th>
    <th style="background-color:#ff531a">Catagory</th>
    <th style="background-color:#3366ff">Author</th>
    <th style="background-color:#b84dff">Action</th>
  </tr>
  <?php
    $qr = mysqli_query($con,"select * from book_details");
    while($row = mysqli_fetch_array($qr)){
      ?>
      <tr>
        <td><?php echo $row['BOOK_CODE'];?></td>
        <td><?php echo $row['BOOK_TITLE'];?></td>
        <td><?php echo $row['CATEGORY'];?></td>
        <td><?php echo $row['AUTHOR'];?></td>
        <td>
          <form method="post" action="show_all_books.php">
            <input type="hidden" name="bc" value="<?=$row['BOOK_CODE']?>">
            <input type="hidden" name="bt" value="<?=$row['BOOK_TITLE']?>">
            <input type="hidden" name="cat" value="<?=$row['CATEGORY']?>">
            <input type="hidden" name="aut" value="<?=$row['AUTHOR']?>">

            <input type="submit" name="read" value="Want to Read">

          </form>
        </td>
      </tr>
      <?php
    }
  ?>

</table>

<br><br>
<h2 style="background-color:DodgerBlue;text-align:center; color:black; font-size: 50px">MY CHART</h2>
<table>
  <tr> 
    <th style="background-color:#ff0080"> Book Code</th>
    <th style="background-color:#33ffad">Book Title</th>
    <th style="background-color:#ff531a">Catagory</th>
    <th style="background-color:#3366ff">Author</th>
  </tr>
  <?php
    $qr = mysqli_query($con,"select * from book_request where readerid ='$id' ");
    while($row = mysqli_fetch_array($qr)){
      ?>
      <tr>
        <td><?php echo $row['bookcode'];?></td>
        <td><?php echo $row['booktitle'];?></td>
        <td><?php echo $row['catagory'];?></td>
        <td><?php echo $row['author'];?></td>
        
      </tr>
      <?php
    }
  ?>

</table>






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
  
      <h2 style="text-align: center;color: black;font-size: 17px" > Copyright ??2011-2021 Premier University, All Rights Reserved.<br>Software Section , Department of IT,Premier University (Design & Develop).</h2>
    </div>
  </div>



</body>
</html>