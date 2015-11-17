<?php
    session_start();

    include("db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Checkout</title>
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
				  <li><a href="home.php">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use "Register And Checkout" to easily get access to your order history, or use "Checkout as Guest"</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form id="checkout-form">
								<input type="text" placeholder="Display Name" required />
								<input type="text" placeholder="User Name" required />
								<input type="password" placeholder="Password" required />
								<input type="password" placeholder="Confirm password" required />
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<form id="billing-form">
								<div class="form-one">
									<input type="text" placeholder="Company Name" />
									<input type="email" placeholder="Email *" required />
									<input type="text" placeholder="Title" />
									<input type="text" placeholder="First Name *" required />
									<input type="text" placeholder="Middle Name" />
									<input type="text" placeholder="Last Name *" required />
									<input type="text" placeholder="Address 1 *" required />
									<input type="text" placeholder="Address 2" />
								</div>
								<div class="form-two">
									<input type="text" placeholder="Zip / Postal Code *" pattern="[0-9]{5}" title="Enter a valid 5 digit zip code." required />
									<select required>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Canada</option>
									</select>
									<br/>
									<select required>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Canada</option>
									</select>
									<br/>
									<input type="password" placeholder="Confirm password" required />
									<input type="tel" placeholder="Phone *" pattern="^\d{3}-?\d{3}-?\d{4}$" title="Enter a ten digit phone number. XXX-XXX-XXXX" required />
									<input type="tel" placeholder="Mobile Phone" pattern="^\d{3}-?\d{3}-?\d{4}$" title="Enter a ten digit phone number. XXX-XXX-XXXX" />
									<input type="tel" placeholder="Fax" pattern="^\d{3}-?\d{3}-?\d{4}$" title="Enter a ten digit phone number. XXX-XXX-XXXX" />
									<button type="submit" class="btn btn-default get" id="billing-submit">Submit</button>
								</div>


							</form>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="12"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
                  //$quantity = 1;
              }

              // remove the last comma
              $ids = rtrim($ids, ',');
              //start table
              $cart_query = "SELECT *
                    FROM products
                    WHERE productID IN ({$ids}) ORDER BY name";
              $select_products_result = $mysqli->query($cart_query);

            if( !$select_products_result ) {
              die($mysqli->error);
            } else {

            while($row = $select_products_result->fetch_object()) {
            ?>
            <tr>
              <td class="cart_product">
                <a href="product-details.php?productID=<?php echo $row->productID; ?>"><img src=<?php echo "\"$row->image_tn\""; ?> alt=<?php echo "\"$row->name\""; ?>></a>
              </td>
              <td class="cart_description">
                <h4><a href="product-details.php?productID=<?php echo $row->productID; ?>"><?php echo "$row->name"; ?></a></h4>
                <p>SKU: <?php echo "$row->sku"; ?></p>
              </td>
              <td class="cart_price">
                <p>$<?php echo "$row->price"; ?></p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <?php echo "<a href='cart.php?id=$row->productID&name=$row->name&action=quantity_add'> + </a>"; ?>
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$<?php echo "$row->price"; ?></p>
              </td>
              <td class="cart_delete">
               <?php echo "<a href='removefromcart.php?id=$row->productID&name=$row->name' class='cart_quantity_delete'><i class='fa fa-times'></i></a>"; ?>
              </td>
            </tr>
            <?php }
              }

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



	<?php include("footer.php"); ?>



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
