<?php
    include("db.php");
    session_start();
    if($_SESSION['type']=="customer" || !isset($_SESSION['Username'])){
        header("Location: index.php");
    }
?>


<html>
<head>

<title>View Orders</title>
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
                <h2 class="display-4">Customers Order</h2>
            </div>
        
            <div class="col-md-12 text-center">
                 <div class="tab-pane fade show active" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab">
                    <div class="row">
                        
                    <?php
                          $sql=" select * FROM orders";
                          $result=$con->query($sql);
                          if(! $result ) {
                            die('Could not get data: ' . mysql_error());
                         }
                         while($row=$result->fetch_assoc()){
                            $customer_name=$row['customer_name'];
                            $phone=$row['phone'];
                            $item_name=$row['item_name'];
                            $quantity=$row['quantity'];
                            $price=$row['price'];
                       
                        
                                echo"
                                <div class='col-md-6 site-animate'>
                                <div class='media menu-item' style='text-align:left;'>
                                <div class='media-body'>
                                <h5 class='mt-0'> Customer Name: <i style='color:blue;''>".$customer_name."</i></h5>";
                                echo"<h5 class='mt-0'>Phone: <i style='color:blue;'>".$phone."</i></h5>";
                                echo"<h5 class='mt-0'>Item Name:<i style='color:blue;'> ".$item_name."</i></h5>";
                                echo"<h5 class='mt-0'> Quantity: <i style='color:blue;'>".$quantity."</i></h5>";
                                echo"<h6 class='text-primary menu-price'>Rs. <i>".$price."</i></h6>
                                </div>
                                </div>
                                </div>
                                ";
                        
                      }
                        ?>


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