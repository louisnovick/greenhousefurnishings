<?php
    session_start();

    include("db_connect.php");

	if (isset($_GET['collection']) && isset($_GET['type'])) {;
		 
	    $select_products_query = "SELECT * 
	    						  FROM products 
	    						  WHERE type = '".$_GET['type']."' AND collection = '".$_GET['collection']."'";
	    $select_products_result = $mysqli->query($select_products_query);
	} else if (isset($_GET['collection'])) {
		$select_products_query = "SELECT * 
	    						  FROM products 
	    						  WHERE collection = '".$_GET['collection']."'";
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
											<li><a href="shop.php?collection=vintage&type=lamp">Vintage</a></li>
											<li><a href="shop.php?collection=rustic&type=lamp">Rustic</a></li>
											<li><a href="shop.php?collection=modern&type=lamp">Modern</a></li>
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
											<li><a href="shop.php?collection=vintage&type=chair">Vintage</a></li>
											<li><a href="shop.php?collection=rustic&type=chair">Rustic</a></li>
											<li><a href="shop.php?collection=modern&type=chair">Modern</a></li>
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
											<li><a href="shop.php?collection=vintage&type=sofa">Vintage</a></li>
											<li><a href="shop.php?collection=rustic&type=sofa">Rustic</a></li>
											<li><a href="shop.php?collection=modern&type=sofa">Modern</a></li>
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
											<li><a href="shop.php?collection=vintage&type=bookcase">Vintage</a></li>
											<li><a href="shop.php?collection=rustic&type=bookcase">Rustic</a></li>
											<li><a href="shop.php?collection=modern&type=bookcase">Modern</a></li>
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
											<li><a href="shop.php?collection=vintage&type=table">Vintage</a></li>
											<li><a href="shop.php?collection=rustic&type=table">Rustic</a></li>
											<li><a href="shop.php?collection=modern&type=table">Modern</a></li>
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
											<li><a href="shop.php?collection=vintage&type=dresser">Vintage</a></li>
											<li><a href="shop.php?collection=rustic&type=dresser">Rustic</a></li>
											<li><a href="shop.php?collection=modern&type=dresser">Modern</a></li>
										</ul>
									</div>
								</div>
								
							</div>
							
						</div><!--/category-products-->
					
							<div class="brands_products"><!--brands_products-->
							<h2>Collections</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="shop.php?collection=vintage"> <span class="pull-right">(20)</span>Vintage Collection</a></li>
									<li><a href="shop.php?collection=rustic"> <span class="pull-right">(20)</span>Rustic Collection</a></li>
									<li><a href="shop.php?collection=modern"> <span class="pull-right">(20)</span>Modern Collection</a></li>
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
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Items</h2>						
						<?php
							while($row = $select_products_result->fetch_object()) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src=<?php echo "\"$row->image_tn\""; ?> alt=<?php echo "\"$row->name\""; ?> />
											<h2><?php echo "$row->price"; ?></h2>
											<p><?php echo "$row->name"; ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo "$row->price"; ?></h2>
												<p><?php echo "$row->name"; ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
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