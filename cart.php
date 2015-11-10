<?php
    session_start();

    include("db_connect.php");

    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $name = isset($_GET['name']) ? $_GET['name'] : "";

    if($action=='removed'){
        echo "<div class='alert alert-info'>";
            echo "<strong>{$name}</strong> was removed from your cart!";
        echo "</div>";
    }

    else if($action=='quantity_updated'){
        echo "<div class='alert alert-info'>";
            echo "<strong>{$name}</strong> quantity was updated!";
        echo "</div>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Cart</title>
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
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
          <?php
          if(count($_SESSION['cart_items'])>0){

              // get the product ids
              $ids = "";
              foreach($_SESSION['cart_items'] as $id=>$value){
                  $ids = $ids . $id . ",";
              }

              // remove the last comma
              $ids = rtrim($ids, ',');
              //start table
              $cart_query = "SELECT *
                    FROM products
                    WHERE productID IN ({$ids}) ORDER BY name";
              $select_products_result = $mysqli->query($cart_query);

            while($row = $select_products_result->fetch_object()) {
            ?>
            <tr>
              <td class="cart_product">
                <a href=""><img src=<?php echo "\"$row->image_tn\""; ?> alt=<?php echo "\"$row->name\""; ?> /></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo "$row->name"; ?></a></h4>
                <p>SKU: <?php echo "$row->productID"; ?></p>
              </td>
              <td class="cart_price">
                <p>$<?php echo "$row->price"; ?></p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_up" href=""> + </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$99</p>
              </td>
              <td class="cart_delete">
               <?php echo "<a href='removefromcart.php?id=$row->productID&name=$row->name' class='cart_quantity_delete'><i class='fa fa-times'></i></a>"; ?>
              </td>
            </tr>
            <?php }
              } else {
                  echo "<div class='alert alert-danger'>";
                      echo "<strong>No products found</strong> in your cart!";
                  echo "</div>";
              }
              ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Canada</option>
								</select>

							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>United States</option>
									<option>Canada</option>
								</select>

							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$297</span></li>
							<li>Eco Tax <span>$30</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$327</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include("footer.php"); ?>



  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
