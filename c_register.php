<?php include "db.php";?>
<?php
session_start();
if(!isset($_SESSION['Username'])){

?>
<?php



$message="";

if(isset($_POST['signup'])){
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
		
				$name=htmlspecialchars($_POST['name']);
				$phone=htmlspecialchars($_POST['phone']);
				$email=htmlspecialchars($_POST['email']);
				$password=$_POST['password'];
        $type=$_POST['type'];

//          echo"<script>window.alert('".$name.",".$phone.",".$email.",".$password.",".$type."');</script>";
				//$password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
				$sql="INSERT INTO customers (c_name,c_email,password,phone,c_type) VALUES ('".$name."','".$email."','".$password."','".$phone."','".$type."')";
		if($con->query($sql)){
				echo"<script>window.alert('Registered Successfully..')</script>";
				echo"<script>window.open('login.php','_self')</script>";

			}

  }
  else{
    echo"<script>window.alert('Fill All Required Fields.')</script>";
	}
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Signup</title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    

    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    .signup{
    
      position: relative;
     top:7rem;
      left: 19rem;
      bottom:1rem;
      
    }
    .site-cover {
    background-position: center center;
    height: 47rem !important;
}
    </style>
  </head>
  <body>
  <?php include("navbar.php");?> 
  <section class="site-cover" style="background-image: url(image/bg.jpg);" id="section-home">  
    
     <div class="container">
      <div class="row" id="signup">

        <!--sign-up form-->
        <div class="col-sm-6"  >
          <div class="card signup"  >
            <div class="card-header" >
              <h3>Sign up to</h3>
            </div>  
          <div class="card-body sign_body" >
              <form method="post" action=" <?php echo $_SERVER['PHP_SELF'];?>">
              <div class="form-group">
                <label for="firstname">Full Name</label>
                <input type="text" class="form-control" id="firstname" name="name" placeholder="Enter Full Name"> 
              </div>

              <div class="form-group">
                <label for="emailaddr">Email address</label>
                <input type="email" class="form-control" id="emailaddr" name="email"  placeholder="Enter email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              
              </div>

              <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
               
              </div>
              
              <div class="form-group">
              <label for="phone">Phone Number</label>
                <div class="row">
                  <div class="col-md-8">
                  <input type="text" class="form-control" id="phone" name="phone" maxlength="10" placeholder="Enter phone number">  
                  </div>
                  <div class="col-md-4">
                    <select name="type" class="form-control">
                      <option value="veg">Veg</option>
                      <option value="non-veg">Non-Veg</option>
                    </select>

                  </div>
                </div>
               
              </div>
              
              <button type="submit" class="btn btn-primary" name="signup" href="#">Signup</button>
            </form>
          </div>
        
        <div class="card-footer" style="margin:0px">
              Already a member? <a href="login.php" style="text-decoration: none;
        color:#0366d6;" >LogIn</a>
            </div>
        </div>
      </div>
    </div>
  </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
<?php }else{
    header("Location: index.php");
}?>