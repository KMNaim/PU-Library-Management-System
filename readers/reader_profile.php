<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reader Profile</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body style="background-image: url(bg2.jpg);">
<h5 style="text-align: right;color: yellow;font-size: 17px">Go Anywhere. Learn Anything. Read Everyday.</h5>
  <h1 style="text-align:center; color:rgb(33, 255, 225); font-size: 50px">Premier University Library</h1>
  <h2 style="text-align: center; color: rgb(122, 255, 104); font-size: 20px;">Center of Excellence for Quality Learning</h2>
	<!-- Navbar -->
	<?php ?>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  
				  <div class="card-body">

						<?php 
							include('../connection.php');
							$user = $_GET['id'];
							$q = mysqli_query($con,"select * from readers where READER_ID = '$user'");
							$row = mysqli_fetch_assoc($q);
						?>

						
						
						<img src="../uploadedimage/<?php echo $row['IMAGE']?>" class="img-fluid"></h4>

					



				   
				    
				  </div>
				</div>
			</div>
			
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Name :</h4>
						<h4><?php echo $row['READER_NAME']?></h4>
						
						<a href="manage_categories.php" class="btn btn-primary">Update</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Email :</h4>
						<h4><?php echo $row['EMAIL']?></h4>
						
						<a href="manage_brand.php" class="btn btn-primary">Update</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title"> Phone Number :</h4>
						<h4><?php echo $row['NUMBER']?></h4>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Update</a>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
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
