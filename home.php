
<?php include("db_connect.php");

	session_start();

	$select_query = "SELECT product_name,
					products,
					skuId
					FROM products";
	$select_result = $mysqli->query($select_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Greenhouse Furniture | Home</title>
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
									<h2>Eco-Friendly Furniture</h2>
									<p>Greenhousefurniture.com offers a full range of furniture built from sustainable and environmentally safe materials. Using the wood from trees that have been specifically planted for use in the creation of wood based products, Green House Furniture offers a full range of eco-friendly furniture that will please even the most design conscious and environmentally friendly connoisseur. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/ModernLamp1.jpg" class="furniture img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>GREEN</span>HOUSE</h1>
									<h2>Eco-Friendly Furniture</h2>
									<p>Brighten and accessorize your modern home without harming the environment or creating a toxic living space with Green House Furniture's innovative collection of eco-friendly lighting. Made from recylced metal and plastic, reclaimed wood, and other safe materials, every piece in our collection is meticulously crafted so that you can get the quality and durability you need without hurting the environment in the process. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/RusticLamp3.jpg" class="furniture img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>GREEN</span>HOUSE</h1>
									<h2>Eco-Friendly Furniture</h2>
									<p>Combining great modern style with eco-conscious design, Green House Furniture's collection of eco-friendly furniture offers plenty of solutions for getting comfortable and stylish while staying green. Featuring sofas, chairs, lamps, shelving and other types of essentials our collection offers furnishings for every room and in timeless, contemporary styles you'll enjoy for years to come. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
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
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#lamps">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Lamps
										</a>
									</h4>
								</div>
								<div id="lamps" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vintage</a></li>
											<li><a href="#">Rustic</a></li>
											<li><a href="#">Modern</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#chairs">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Chairs
										</a>
									</h4>
								</div>
								<div id="chairs" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vintage</a></li>
											<li><a href="#">Rustic</a></li>
											<li><a href="#">Modern</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sofas">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sofas
										</a>
									</h4>
								</div>
								<div id="sofas" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vintage</a></li>
											<li><a href="#">Rustic</a></li>
											<li><a href="#">Modern</a></li>
										</ul>
									</div>
								</div>

							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#bookcases">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Bookcases
										</a>
									</h4>
								</div>
								<div id="bookcases" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vintage</a></li>
											<li><a href="#">Rustic</a></li>
											<li><a href="#">Modern</a></li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#tables">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Tables
										</a>
									</h4>
								</div>
								<div id="tables" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vintage</a></li>
											<li><a href="#">Rustic</a></li>
											<li><a href="#">Modern</a></li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#dressers">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Dressers
										</a>
									</h4>
								</div>
								<div id="dressers" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Vintage</a></li>
											<li><a href="#">Rustic</a></li>
											<li><a href="#">Modern</a></li>
										</ul>
									</div>
								</div>
								
							</div>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Collections</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(20)</span>Vintage Collection</a></li>
									<li><a href="#"> <span class="pull-right">(20)</span>Rustic Collection</a></li>
									<li><a href="#"> <span class="pull-right">(20)</span>Modern Collection</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="5000" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 5,000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>

<!--/PHP FEATURED ITEM PULL-->

				<?php $featured = "SELECT *
									FROM products
										WHERE productID=1";
										$featured_result = $mysqli->query($featured);
					$featured_item = $featured_result-> fetch_object();
				?>

				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Furniture</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php print "<img src=\"".$featured_item->image_tn."\" alt=\"".$featured_item->name."\"\n"; ?>
											<img src="images/home/VintageLamp1.jpg" alt="" />
											<?php print "<p><h2>".$featured_item->price."</h2></p>\n";  ?>
											<?php print "<p>".$featured_item->name."</p>\n";  ?>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<?php print "<p>".$featured_item->price."</p>\n";  ?>
												<?php print "<p>".$featured_item->name."</p>\n";  ?>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>


				<?php $featured = "SELECT *
									FROM products
										WHERE productID=2";
										$featured_result = $mysqli->query($featured);
					$featured_item = $featured_result-> fetch_object();
				?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php print "<img src=\"".$featured_item->image_tn."\" alt=\"".$featured_item->name."\"\n"; ?>
										<img src="images/home/ModernLamp3.jpg" alt="" />
										<?php print "<p><h2>".$featured_item->price."</h2></p>\n";  ?>
											<?php print "<p>".$featured_item->name."</p>\n";  ?>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<?php print "<p>".$featured_item->price."</p>\n";  ?>
											<?php print "<p>".$featured_item->name."</p>\n";  ?>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>

			<?php $featured = "SELECT *
									FROM products
										WHERE productID=3";
										$featured_result = $mysqli->query($featured);
					$featured_item = $featured_result-> fetch_object();
				?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php print "<img src=\"".$featured_item->image_tn."\" alt=\"".$featured_item->name."\"\n"; ?>
										<img src="images/home/RusticLamp4.jpg" alt="" />
										<?php print "<p><h2>".$featured_item->price."</h2></p>\n";  ?>
											<?php print "<p>".$featured_item->name."</p>\n";  ?>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<?php print "<p>".$featured_item->price."</p>\n";  ?>
											<?php print "<p>".$featured_item->name."</p>\n";  ?>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/ModernLamp2.jpg" alt="" />
										<h2>$56</h2>
										<p>Modern Lamp</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$56</h2>
											<p>Modern Lamp</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/RusticLamp1.jpg" alt="" />
										<h2>$56</h2>
										<p>Rustic Lamp</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$56</h2>
											<p>Rustic Lamp</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/VintageLamp1.jpg" alt="" />
										<h2>$56</h2>
										<p>Vintage Lamp</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$56</h2>
											<p>Vintage Lamp</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="recent"><a href="#lamps" data-toggle="tab">Recently Viewed</a></li>
								<li><a href="#hot" data-toggle="tab">Hot Items</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="recent" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/VintageLamp3.jpg" alt="" />
												<h2>$56</h2>
												<p>Vintage Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/ModernLamp3.jpg" alt="" />
												<h2>$56</h2>
												<p>Modern Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/RusticLamp2.jpg" alt="" />
												<h2>$56</h2>
												<p>Rustic Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/ModernLamp1.jpg" alt="" />
												<h2>$56</h2>
												<p>Modern Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>

						<div class="tab-pane fade active in" id="hot" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/VintageLamp3.jpg" alt="" />
												<h2>$56</h2>
												<p>Vintage Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/ModernLamp3.jpg" alt="" />
												<h2>$56</h2>
												<p>Modern Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/RusticLamp2.jpg" alt="" />
												<h2>$56</h2>
												<p>Rustic Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/ModernLamp1.jpg" alt="" />
												<h2>$56</h2>
												<p>Modern Lamp</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
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
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
    <script src="js/main.js"></script>
</body>
</html>


<?php $mysqli->close(); ?>