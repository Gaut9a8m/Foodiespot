<?php include "db.php";?>
<?php
session_start();
if(isset($_SESSION['Username'])){
    header("Location: index.php");
}
$message="";



if(isset($_POST['login'])){

	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
    $type=$_POST['type'];
   // echo"<script> window.alert('".$username.",".$password.",".$type."')</script>";


    if($type=="admin"){
      $query="SELECT * FROM admins WHERE email = '{$username}'";
      $result=$con->query($query);
      if(! $result ) {
        die('Could not get data: ' . mysql_error());
     }
     if(($result->num_rows)!=0){
      while($row=$result->fetch_assoc()){
          $db_password=$row['password'];
          $db_email = $row['email'];
          $db_name=$row['name'];
         
          if($password==$db_password){
            //session_start();
            $_SESSION['Username']=$db_email;
            $_SESSION['name']=$db_name;
            $_SESSION['type']=$type;
            echo"<script>window.open('index.php','_self');</script>";
        }else{
            echo"<script> window.alert('Not Found...')</script>";
            echo"<script>window.open('login.php','_self');</script>";
          }
      }
    }
    else{
      echo"<script> window.alert('Not Found...')</script>";
      echo"<script>window.open('login.php','_self');</script>";
    }

    }
    else if($type == "customer"){
      $query="SELECT * FROM customers WHERE c_email = '{$username}'";
      $result=$con->query($query);
      if(! $result ) {
        die('Could not get data: ' . mysql_error());
     }
     if(($result->num_rows)!=0){
      while($row=$result->fetch_assoc()){
        $db_password=$row['password'];
        $db_email = $row['c_email'];
        $db_name=$row['c_name'];
        
        if($password==$db_password){
          //session_start();
          $_SESSION['Username']=$db_email;
          $_SESSION['name']=$db_name;
          $_SESSION['type']=$type;
         echo"<script>window.open('index.php','_self');</script>";
      }else{
        echo"<script> window.alert('Not Found...')</script>";
       echo"<script>window.open('login.php','_self');</script>";
        }
  }
     }
      else{
        echo"<script> window.alert('Not Found...')</script>";
        echo"<script>window.open('login.php','_self');</script>";
      }

	
	}
}
  else{
    echo"<script> window.alert('Fill All required fields.')</script>";
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
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
    .login{
      position: relative;
      top:7rem;
        left:20rem;
        font-family: Helvetica;
    }
    .site-cover {
    background-position: center center;
    height: 41rem !important;
}
    </style>
  </head>
  <body>
   <?php include("navbar.php");?> 
  <section class="site-cover" style="background-image: url(image/bg.jpg); " id="section-home">  
  <div class="container">
      <div class="row">
    <p><?php echo $message;?></p>
    
    
        <!--login form-->
        <div class="col-sm-6">
          <div class="card login" >
            <div class="card-header">
              <h2>Sign in to</h2>
            </div>  
          <div class="card-body login_body">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

              <div class="form-group">
                <label for="emailaddr">Type Of User</label>
                <select name="type">
                <option value="admin">Restaurant</option>
                <option value="customer">Customer</option>
                </select>
              
              </div>

              <div class="form-group">
                <label for="emailaddr">Email address</label>
                <input type="email" class="form-control" id="emailaddr" name="username" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              
              </div>
              <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
          </div>
		        <div class="card sign" id="signup">
              <div class="row">
                  <div class="col-md-6">
                  <p align="center" id="new">New to Site?<a href="c_register.php" style="text-decoration: none; 
                  color:#0366d6;">Register Customer </a></p>
                  </div>
                  <div class="col-md-6">  
                    <p align="left" id="new">New to Site?<a href="a_register.php" style="text-decoration: none;margin-left:-50px;
                    color:#0366d6;" >Register Restaurant </a></p> 
                  </div>
                 </div>  
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