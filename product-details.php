<?php
    session_start();
    include("db_connect.php");
    if (isset($_GET['productID'])) {

      $select_product_query = "SELECT * FROM products WHERE productID = '".$_GET['productID']."'";
      $select_product_result = $mysqli->query($select_product_query);
      $product_details = $select_product_result->fetch_object();
      $select_rating_query = "SELECT *, date_format(date, '%W %m/%d/%Y %l:%i %p') date FROM ratings WHERE productID = '".$_GET['productID']."'";
      $select_rating_result = $mysqli->query($select_rating_query);
    } else {    }
    if (isset($_POST['rating_submit']) && isset($_SESSION['logged_in'])) {
      $add_review_query = "INSERT INTO ratings (productID, rating, comment, username)
                  VALUES ('".$_GET['productID']."', '".$_POST['rating']."', '".$_POST['comment']."', '".$_SESSION['logged_in_user']."')";
      $add_review = $mysqli->query($add_review_query);
      unset($_POST['rating_submit']);

      header('Location: product-details.php?productID='.$_GET['productID']);
    }
    if (isset($_GET['ratingID'])) {
      $set_comment_to_inactive_query = "UPDATE ratings SET active='2' WHERE ratingID='".$_GET['ratingID']."'";
      $mysqli->query($set_comment_to_inactive_query);
        header('Location: product-details.php?productID='.$_GET['productID']);
    }

    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
    $name = isset($_GET['name']) ? $_GET['name'] : "";
    if($action=='added'){
      echo "<div class='alert alert-info'>";
          echo "<strong>{$name}</strong> was added to your cart!";
      echo "</div>";
    }
    if($action=='exists'){
      echo "<div class='alert alert-info'>";
          echo "<strong>{$name}</strong> already exists in your cart!";
      echo "</div>";
    }
    if (isset($_GET['productID'])) {
      $details_query = "SELECT * FROM products WHERE productID = '".$_GET['productID']."'";
      $details_result = $mysqli->query($details_query);
      $product_details_cartinfo = $details_result->fetch_object();
    } else {
      header("Location: shop.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
  <?php include("header.php"); ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3"><!-- sidebar container -->
          <?php include("sidebar.php"); ?>
        </div>

        <div class="col-sm-9 padding-right">
          <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
              <div class="view-product">
                <img src=<?php echo "\"$product_details->image_tn\""; ?> alt=<?php echo "\"$product_details->name\""; ?> />
                <h3>ZOOM</h3>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <h2><?php echo "$product_details->name"; ?></h2>
                <p>SKU: <?php echo "$product_details->sku"; ?></p>
                <span>
                  <span>US $<?php echo "$product_details->price"; ?></span>
                  <label>Quantity:</label>
                  <input type="text" value="1" />
                  <input type="text" value="3" />
                    <?php echo "<a href='addtocart.php?id=$product_details_cartinfo->productID&name=$product_details->name' class='btn btn-fefault cart'><i class='fa fa-shopping-cart'></i> Add to cart</a>" ?>
                </span>
                <p><b>Height</b> <?php echo "$product_details->height"; ?>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Width</b> <?php echo "$product_details->width"; ?>''</p>
                <p><b>Depth</b> <?php echo "$product_details->depth"; ?>''&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Weight</b> <?php echo "$product_details->weight"; ?>lbs.</p>
                <p><b>Collection:</b><?php echo "$product_details->collection"; ?></p>
                <p>
                  <b>Description</b><br>
                  <?php echo "$product_details->description"; ?>
                </p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->

          <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                <li><a href="#add_review" data-toggle="tab">Add a Review</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade" id="add_review" >
                  <?php
                    if (isset($_SESSION['logged_in'])) {
                  ?>
                <div class="col-sm-12">
                  <p><b>Write Your Review</b></p>

                  <form action="product-details.php?productID=<?php print($_GET['productID']); ?>" method="post">
                    <select name="rating" id="rating">
                      <option value="5">5</option>
                      <option value="4">4</option>
                      <option value="3">3</option>
                      <option value="2">2</option>
                      <option value="1">1</option>
                    </select>
                    <textarea name="comment" id="rating"></textarea>
                    <button type="submit" class="btn btn-default pull-right" name="rating_submit" id="rating_submit">
                      Submit
                    </button>
                  </form>
                </div>
              </div>
                  <?php
                    } else {
                  ?>
                <div class="col-sm-12">
                  <p><b>Sorry, but you must be logged in to leave a review.</b></p><br>
                  <a href="login.php">Login</a>
                </div>
              </div>
                  <?php
                    }
                  ?>

              <div class="tab-pane fade active in" id="reviews" >
                <?php
                  while ($row = $select_rating_result->fetch_object()) {
                    if ($row->active == 1) {
                ?>
                <div class="col-sm-12">
                  <ul>
                    <li><a href=""><i class="fa fa-user"></i><?php print($row->username) ?></a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i><?php print($row->date) ?></a></li>
                    <li><a href=""><?php print($row->rating) ?>/5</a></li>
                    <?php
                      if (isset($_SESSION['logged_in_user'])) {
                        if ($row->username == $_SESSION['logged_in_user']) {
                    ?>
                    <li><a href="product-details.php?productID=<?php print($_GET['productID']); ?>&ratingID=<?php print($row->ratingID) ?>">Remove</a></li>
                    <?php
                        }
                      }
                    ?>
                  </ul>
                  <p><?php print($row->comment) ?></p>
                </div>
                <?php
                    }
                  }
                ?>
              </div>

            </div>
          </div><!--/category-tab-->

          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="images/home/ModernLamp2.jpg" alt="" />
                          <h2>$56</h2>
                          <p>Modern Lamp</p>
                          <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="images/home/ModernLamp3.jpg" alt="" />
                          <h2>$56</h2>
                          <p>Modern Lamp</p>
                          <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="images/home/ModernLamp1.jpg" alt="" />
                          <h2>$96</h2>
                          <p>Modern Lamp</p>
                          <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="images/home/RusticLamp2.jpg" alt="" />
                          <h2>$56</h2>
                          <p>Rustic Lamp</p>
                          <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="images/home/RusticLamp3.jpg" alt="" />
                          <h2>$56</h2>
                          <p>Rustic Lamp</p>
                          <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="images/home/ModernLamp1.jpg" alt="" />
                          <h2>$56</h2>
                          <p>Rustic Lamp</p>
                          <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
          </div><!--/recommended_items-->

        </div>
      </div>
    </div>
  </section>

  <?php include("footer.php"); ?>



    <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
$mysqli->close();
?>
