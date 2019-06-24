<?php
    include("db.php");
    session_start();
if($_SESSION['type']=="customer" || !isset($_SESSION['Username'])){
    header("Location: index.php");
}


    if(isset($_POST['submit'])){
        if(!empty($_POST['menu_name']) && !empty($_POST['price']) ){
            $menu_name=htmlspecialchars($_POST['menu_name']);
            $menu_type=$_POST['menu_type'];
            $price=$_POST['price'];
            // echo'<script>
            // window.alert("'.$menu_name.','.$menu_type.','.$price.'");
            // </script>';

            $sql="INSERT INTO menu (menu_name,menu_type,price) VALUES ('".$menu_name."','".$menu_type."','".$price."')";
            if($con->query($sql) === TRUE ){
                echo'<script>window.alert("Menu Added Successfully.");</script>';
                //  header("Location: addmenu.php"); 
                echo"<script>window.open('addmenu.php','_self');</script>";
            }
            else{
                echo'<script>window.alert("error'.$con->error.'");</script>';
            }
        }
        else{
            echo'<script>window.alert("Fill all required fields.");</script>';
        }
    }
?>


<html>
<head>

<title>Add Menu</title>
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
        <section class="site-section">
            <div class="container">
            <div class="row">
            <h2 class="display-4" style="margin-bottom:15px;">Add Items In Menu</h2>
            <div class="col-md-12  mb-5 site-animate">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name of Item</label>
                            <input type="text"  name="menu_name" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" name="menu_type" id="exampleFormControlSelect1">
                            <option value="veg">Veg</option>
                            <option value="non-veg">Non-Veg</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Price</label>
                            <input type="text"  name="price" class="form-control" id="exampleFormControlInput1" placeholder="Rs.">
                        </div>

                        <div class="form-group" style="text-align:center;">
                        <input type="submit" name="submit" class="btn btn-primary" style="width:25%;">
                        </div>
                        
                    </form>
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