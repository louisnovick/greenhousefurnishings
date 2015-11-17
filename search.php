<?php
	session_start();

	$search_failed = false;
	$pattern_search = "/^[a-zA-Z]{1,20}$/";

	include("db_connect.php");
	if (preg_match($pattern_search, $_POST['search']) == 1) {
		if (isset($_POST['search'])) {

			$search_query = "SELECT * FROM products WHERE name LIKE '%".$_POST['search']."%' OR collection LIKE '%".$_POST['search']."%' OR type LIKE '%".$_POST['search']."%'";
			$search_result = $mysqli->query($search_query);

			if ($search_result->fetch_object() == "") {
				$search_failed = true;
			}
		}
	} else {
		$search_failed = true;
	}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Search</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/andrew_style.css" rel="stylesheet">
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
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"><!-- sidebar container -->
					<?php include("sidebar.php"); ?>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">
							<?php 
								if (isset($_POST['search'])) {
									print("Search results for: ".$_POST['search']);
								}
							?>
						</h2>
						<?php
							if ($search_failed == true) {
								print("Sorry, but the search for ".$_POST['search']." returned no results...");
							} else {

							while($row = $search_result->fetch_object()) {
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
							</div>
						</div>
						<?php }
							}
						 ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	
	<?php include("footer.php"); ?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
$mysqli->close();
?>