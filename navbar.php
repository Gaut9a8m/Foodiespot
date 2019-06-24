
<nav class="navbar navbar-expand-lg navbar-dark site_navbar bg-dark site-navbar-light" id="site-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">FoodieSpot</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="site-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item active"><a href="menu.php" class="nav-link">Menu</a></li>

            <?php 
            
                if(isset($_SESSION['Username'])){
                    if($_SESSION['type']=="admin"){
                        print'
                        <li class="nav-item active"><a href="vieworder.php" class="nav-link">View Orders</a></li>
                        <li class="nav-item active"><a href="addmenu.php" class="nav-link">Add Menu</a></li>
                        
                        <li class="nav-item active"><a href="signout.php" class="nav-link">'.$_SESSION['name'].' / signout</a></li>
                        ';
                    } 
                    elseif($_SESSION['type']=="customer"){
                     print'
                      <li class="nav-item active"><a href="order.php" class="nav-link">Order</a></li>
                     
                      <li class="nav-item active"><a href="signout.php" class="nav-link">'.$_SESSION['name'].' / signout</a></li>
                      ';
                    } 
                       
                }
                else{
                  print'<li class="nav-item active"><a href="login.php" class="nav-link">Login/Register</a></li>';
                }

            ?>


            
          </ul>
        </div>
      </div>
    </nav>