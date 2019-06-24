<?php
    include("db.php");
    session_start();


    if(isset($_GET['submit'])){
      if(!isset($_SESSION['Username'])){
        header("Location: login.php");
      }
      else if($_SESSION['type']=="admin"){
        echo"<script>window.alert('Only Customers Can Order Food.');</script>";
      }
      else{
           $menu_name=$_GET['item_name'];
           $price=$_GET['price'];
          $email=$_SESSION['Username'];
          $sql="SELECT * FROM customers WHERE c_email='".$email."'";
          $result=$con->query($sql);
          if(! $result ) {
            die('Could not get data: ' . mysql_error());
         }
         while($row=$result->fetch_assoc()){
            $c_name=$row['c_name'];
            $phone=$row['phone'];
         }
         $item_name=$menu_name;
         $quantity="1";
        echo"<script>window.alert('".$c_name."--".$menu_name."--".$price."-- Your Order is Cooking. Thank You for Ordering.');</script>";
         $sql="INSERT INTO orders (customer_name,phone,item_name,quantity,price) VALUES ('".$c_name."','".$phone."','".$item_name."','".$quantity."','".$price."')";
         if($con->query($sql)=== TRUE){
            echo"<script>window.alert('Wait is Over. Your Food is Ready.');</script>";
            echo"<script>window.open('order.php','_SELF');</script>";
         }
         else{
           echo"ERRORRRRRRR...".mysql_error();
         }
      }

    }



?>


<html>
<head>

<title>menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .site-navbar-light{
        background: black !important;
    }
    </style>

</head>
<body>
    <?php include("navbar.php");?>

    <section class="site-section" id="section-menu">
      <div class="container">
        <div class="row">
        
          <div class="col-md-12 text-center mb-5 site-animate">
            <h2 class="display-4">Delicious Menu</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">" Tell me what you eat, and I will make it for you. "</p>
              </div>
            </div>
            
          </div>

          <div class="col-md-12 text-center">

            <ul class="nav site-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
              <li class="nav-item site-animate">
                <a class="nav-link active" id="pills-breakfast-tab" data-toggle="pill" href="#pills-breakfast" role="tab" aria-controls="pills-breakfast" aria-selected="true">Vegetarian</a>
              </li>
              <li class="nav-item site-animate">
                <a class="nav-link" id="pills-lunch-tab" data-toggle="pill" href="#pills-lunch" role="tab" aria-controls="pills-lunch" aria-selected="false">Non-Vegetarian</a>
              </li>
            </ul>

            <div class="tab-content text-left">
                <!-- veg section-->
              
              <div class="tab-pane fade show active" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab">
                <div class="row">
                 
                    
                  
                      <?php
                          $sql=" select * FROM menu";
                          $result=$con->query($sql);
                          if(! $result ) {
                            die('Could not get data: ' . mysql_error());
                         }
                         while($row=$result->fetch_assoc()){
                            $menu_name=$row['menu_name'];
                            $menu_type=$row['menu_type'];
                            $price=$row['price'];
                       
                         if($menu_type == "veg"){
                                echo"
                                <div class='col-md-6 site-animate'>
                                <div class='media menu-item'>
                                <img class='mr-3' src='image/menu.png' class='img-fluid' alt='image'>
                                <div class='media-body'>
                                <h5 class='mt-0'>".$menu_name."</h5>";
                                echo"<h6 class='text-primary menu-price'>Rs.".$price."</h6>
                                <form method='get' action='menu.php'>
                                  <input type='hidden' name='item_name' value='".$menu_name."'/>
                                  <input type='hidden' name='price' value='".$price."'/>
                                  <button input='submit' name='submit' class='btn-primary btn-success' style='color:white;'>Order Now</button>
                                </form>
                                
                                </div>
                                </div>
                                </div>
                                ";
                        }
                      }
                        ?>
                </div>
              </div>
              <!-- non veg section-->
              <div class="tab-pane fade" id="pills-lunch" role="tabpanel" aria-labelledby="pills-lunch-tab">
                <div class="row">
                  
                      <?php
                            $sql=" select * FROM menu";
                            $result=$con->query($sql);
                            if(! $result ) {
                              die('Could not get data: ' . mysql_error());
                           }
                           while($row=$result->fetch_assoc()){
                              $menu_name=$row['menu_name'];
                              $menu_type=$row['menu_type'];
                              $price=$row['price'];
                             
                         if($menu_type == "non-veg"){ 
                            echo"
                            <div class='col-md-6 site-animate'>
                                <div class='media menu-item'>
                                <img class='mr-3' src='image/menu.png' class='img-fluid' alt='image'>
                                <div class='media-body'>
                                <h5 class='mt-0'>".$menu_name."</h5>";
                                echo"<h6 class='text-primary menu-price'>Rs.".$price."</h6>
                                  <form method='get' action='menu.php'>
                                  <input type='hidden' name='item_name' value='".$menu_name."'/>
                                  <input type='hidden' name='price' value='".$price."'/>
                                  <button input='submit' name='submit' class='btn-primary btn-danger' style='color:white;'>Order Now</button>
                                  </form>
                                </div>
                                </div>
                                </div>
                                ";
                        }
                    }
                      ?>
                    
                  
                </div>
              </div>
             
            </div>

          </div>
        </div>
      </div>
    </section>

    <?php include("footer.php");?>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    
    <script src="js/jquery.animateNumber.min.js"></script>
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>

    <script src="js/main.js"></script>
</body>
</html>