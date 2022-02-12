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
    <link rel="stylesheet" href="ad.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
  
    <div class="services-section">
    <h5 style="text-align: right;color: yellow;font-size: 17px">Go Anywhere. Learn Anything. Read Everyday.</h5>
  <h1 style="text-align:center; color:rgb(33, 255, 225); font-size: 50px">Premier University Library</h1>
  <h2 style="text-align: center; color: rgb(122, 255, 104); font-size: 20px;">Center of Excellence for Quality Learning</h2>
      <div class="inner-width">
        <h1 class="section-title">Admin Home Page</h1>
        <div class="border"></div>
        <div class="services-container">

          <div class="service-box">
            <div class="service-icon">
              <i class="fa fa-edit"></i>
            </div>
            <div class="service-title">Edit Profile</div>
            <a href="adminprofile.php" style=" font-size: 18px;" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
            <div class="service-desc">
             
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-book"></i>
            </div>
            
            <div class="service-title">Books</div>
            <a href="new_book_add.php" style=" font-size: 18px;" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Add New Book</a>
            <div class="service-desc">
              
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-address-book"></i>
            </div>
            <div class="service-title">Approve Book Request</div>
            <a href="book_request.php" style=" font-size: 18px;" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Book Request</a>
            <div class="service-desc">
             
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fa fa-lock"></i>
            </div>
            <div class="service-title">Change Password</div>
            <a href="changepass.php" style=" font-size: 18px;" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Change Password</a>
            <div class="service-desc">
              
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-book-open"></i>
            </div>
            <div class="service-title">All Available Books</div>
            <a href="show_all_books.php" style=" font-size: 18px;" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Available Books</a>
            <div class="service-desc">
              
            </div>
          </div>

          
          <div class="service-box">
            <div class="service-icon">
              <i class="fa fa-list"></i>
            </div>
            <div class="service-title">All Reader</div>
            <a href="all_reader_list.php" style=" font-size: 18px;" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>All Reader list</a>
            <div class="service-desc">
              
            </div>
          </div>

          <div class="container">
   
      <p>
        <a style="align:center" href="homepage.php?logout=log" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
      </p> 
      
    </div>
</div>
</div>
<br><br>
<div id="wrapper">
 <div id="content">

   <h2 style="text-align: center;color: rgb(33, 255, 225);font-size: 17px" > Copyright ©2011-2021 Premier University, All Rights Reserved.<br>Software Section , Department of IT,Premier University (Design & Develop).</h2>
 </div>
</div>
</div>
        </div>
      </div>
    </div>

  </body>
</html>