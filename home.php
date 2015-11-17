
<?php include("db_connect.php");

	session_start();

	$select_products_query = "SELECT *
								  FROM products
								  WHERE feature = '1'";
	$select_products_result = $mysqli->query($select_products_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Greenhouse Furniture | Home</title>
    <link rel="icon" href="favicon.ico">
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

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>GREEN</span>HOUSE</h1>
									<h2>Modern Collection</h2>
									<p>View our Modern Collection! Filled with styles that will bring your home into the current century.</p>
									<a href="shop.php?collection=modern" class="btn btn-default get">View Now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/ModernLamp1.jpg" class="furniture img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>GREEN</span>HOUSE</h1>
									<h2>Rustic Collection</h2>
									<p>Give your home that woodsy feeling by shopping our Rustic Collection!</p>
									<a href="shop.php?collection=rustic" class="btn btn-default get">View Now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/RusticLamp3.jpg" class="furniture img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>GREEN</span>HOUSE</h1>
									<h2>Vintage Collection</h2>
									<p>Feed your nostalgia and shop all vintage furniture! Our Vintage Collection will be sure to remind you of the good ol' days!</p>
									<a href="shop.php?collection=vintage" class="btn btn-default get">View Now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/VintageLamp2.jpg" class="furniture img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"><!-- sidebar container -->
					<?php include("sidebar.php"); ?>
				</div>

<!--/PHP FEATURED ITEM PULL-->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Furniture</h2>
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
												<h2>$<?php echo "$row->price"; ?></h2>
												<p><?php echo "$row->name"; ?></p>
												<a href="product-details.php?productID=<?php echo "$row->productID" ?>" class="btn btn-default add-to-cart">View Details</a>
												<?php echo "<a href='addtocart.php?id=$row->productID&name=$row->name' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>" ?>
											</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div><!--features_items-->
			</div>
		</div>
	</section>

	<?php include("footer.php"); ?>



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


<?php $mysqli->close(); ?>
