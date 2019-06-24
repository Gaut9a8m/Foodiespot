<?php
    include("db.php");
    session_start();

    if(!isset($_SESSION['name']) || $_SESSION['type']=="admin"){
        header("Location: login.php");
    }
?>


<html>
<head>

<title>Order Page</title>
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
            <h2 class="display-4">Your Past Orders</h2>
            
            </div>
          </div>
        <div class="col-md-12 text-center site-animate">
            
                <?php  
                        $name=$_SESSION['name'];
                       $sql="SELECT * FROM orders WHERE customer_name='".$name."'";
                        $result=$con->query($sql);
                        if(! $result ) {
                            die('Could not get data: ' . mysql_error());
                         }
                         while($row=$result->fetch_assoc()){
                            $item_name=$row['item_name'];
                            $price=$row['price'];
                           
                            print'
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="lead" style="color:gold; font-size:30px">'.$item_name.'</h2>
                                        <h2 class="lead" style="font-size:25px;">Rs. '.$price.'</h2>
                                    </div>
                                </div>
                            
                            ';
                         }
                
                 ?>
            
        </div>

        <div class="col-md-6">
        
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