<?php
    session_start();

    include("db_connect.php");

    if (isset($_GET['productID'])) {
    	
    	$select_product_query = "SELECT * FROM products WHERE productID = '".$_GET['productID']."'";
    	$select_product_result = $mysqli->query($select_product_query);
    	$product_details = $select_product_result->fetch_object();

    	$select_rating_query = "SELECT *, date_format(date, '%W %m/%d/%Y %l:%i %p') date FROM ratings WHERE productID = '".$_GET['productID']."'";
    	$select_rating_result = $mysqli->query($select_rating_query);

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
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo "$product_details->name"; ?></h2>
								<p>SKU: <?php echo "$product_details->sku"; ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US $<?php echo "$product_details->price"; ?></span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
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
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
								<li><a href="#add_review" data-toggle="tab">Add a Review</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="add_review" >
								<div class="col-sm-12">
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								<?php
									while ($row = $select_rating_result->fetch_object()) {
								?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php print($row->username) ?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php print($row->date) ?></a></li>
									</ul>
									<p><?php print($row->comment) ?></p>
								</div>
								<?php
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