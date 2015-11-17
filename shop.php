<?php
    session_start();
    include("db_connect.php");


  $action = isset($_GET['action']) ? $_GET['action'] : "";
  $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
  $name = isset($_GET['name']) ? $_GET['name'] : "";
  $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

  if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was added to your cart!";
    echo "</div>";
  }

  if($action=='exists'){
    $quantity =  $_GET['quantity']++;
    echo "<div class='alert alert-info'>";
        echo "<strong>Another {$name}</strong> added to cart";
    echo "</div>";
  }


	if (isset($_GET['collection']) && isset($_GET['type'])) {
	    $select_products_query = "SELECT *
	    						  FROM products
	    						  WHERE type = '".$_GET['type']."' AND collection = '".$_GET['collection']."'";
	    $select_products_result = $mysqli->query($select_products_query);
	} else if (isset($_GET['collection'])) {
		$select_products_query = "SELECT *
	    						  FROM products
	    						  WHERE collection = '".$_GET['collection']."'";
	    $select_products_result = $mysqli->query($select_products_query);
	} else if (isset($_GET['type'])) {
		$select_products_query = "SELECT *
	    						  FROM products
	    						  WHERE type = '".$_GET['type']."'";
	    $select_products_result = $mysqli->query($select_products_query);

	} else {
		$select_products_query = "SELECT *
								  FROM products
								  WHERE feature = '1'";
	  $select_products_result = $mysqli->query($select_products_query);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Shop</title>
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
    <link rel="icon" type="image/png" href="favicon.ico">
</head><!--/head-->

<body>
	<?php include("header.php"); ?>
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"><!-- sidebar container -->
					<?php include("sidebar.php"); ?>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">
							<?php if (isset($_GET['collection']) && isset($_GET['type'])) {
								print($_GET['collection']." ".$_GET['type']."s");
							} else if (isset($_GET['collection'])) {
								print($_GET['collection']." Furniture");
							} else {
								print("Featured Collection");
							}
							?>
						</h2>
						<?php
							while($row = $select_products_result->fetch_object()) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="product-details.php?productID=<?php echo "$row->productID" ?>"><img src=<?php echo "\"$row->image_tn\""; ?> alt=<?php echo "\"$row->name\""; ?> /></a>
											<h2><?php echo "$row->name"; ?></h2>
											<p>$<?php echo "$row->price"; ?></p>

											<a href="product-details.php?productID=<?php echo "$row->productID" ?>" class="btn btn-default add-to-cart">View Details</a>
											<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo "$row->name"; ?></h2>
												<p>$<?php echo "$row->price"; ?></p>
												<a href="product-details.php?productID=<?php echo "$row->productID" ?>" class="btn btn-default add-to-cart">View Details</a>
                        <?php echo "<a href='addtocart.php?id=$row->productID&name=$row->name' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>" ?>
											</div>
									</div>
								</div>
								<!--<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>-->
							</div>
						</div>
						<?php } ?>

						<!--
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul> -->
					</div><!--features_items-->
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
