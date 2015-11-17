<?php
    if(isset($_SESSION["logged_in"])){
      if($_SESSION["logged_in_user_access"] == "administrative") 
        $auth = "a";
      else if($_SESSION["logged_in_user_access"] == "privileged")
        $auth = "p";
      else
        $auth = "u";
    }
    else
      $auth = "u";
  ?>

  
  <header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="tel:1-407-371-1234"><i class="fa fa-phone"></i> 407 371 1234</a></li>
                <li><a href="mailto:info@greenhousefurniture.com"><i class="fa fa-envelope"></i> info@greenhousefurniture.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://www.plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="home.php"><img src="images/home/logo.png" alt="" /></a>
            </div>

          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                <?php if(!isset($_SESSION['logged_in'])) { ?>
                <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                <?php } else { ?>
                <li><a href="logout.php"><i class="fa fa-lock"></i> Logout of <?php print($_SESSION['logged_in_user']) ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact-us.php">Contact</a></li>
                <li class="dropdown"><a href="#">Company Policies<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    <li><a href="privacy-policy.php">Privacy</a></li>
                    <li><a href="refund-policy.php">Refunds</a></li> 
                    <li><a href="shipping-costs.php">Shipping Costs</a></li> 
                    <li><a href="shipping-policy.php">Shipping Policy</a></li> 
                    <li><a href="security-policy.php">Security Policy</a></li> 
                  </ul>
                </li> 
                <?php if($auth == "a" || $auth == "p") echo '<li><a href="admin.php">Admin</a></li>'; ?>
                <?php if (isset($_SESSION['logged_in'])) {
                  echo '<li><a href="user_account.php">Account</a></li>';
                } ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <form action="search.php" method="post">
                <input type="text" placeholder="Search" name="search" id="search" />
                <button name="submit" id="submit" type="submit" class="btn btn-default">Search</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->