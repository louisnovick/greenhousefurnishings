<?php
    session_start();

    include("db_connect.php");

    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $name = isset($_GET['name']) ? $_GET['name'] : "";
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

    if($action=='removed'){
        echo "<div class='alert alert-info'>";
            echo "<strong>{$name}</strong> was removed from your cart!";
        echo "</div>";
    }

    if($action=='added'){
      echo "<div class='alert alert-info'>";
          echo "<strong>{$name}</strong> was added to your cart!";
      echo "</div>";
    }

   if($action=='exists'){
      echo "<div class='alert alert-info'>";
          echo "<strong>{$name} is already in cart</strong> ";
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
    <link rel="icon" type="image/png" href="favicon.ico">
</head><!--/head-->

<body>
	<?php include("header.php"); ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="home.php">Home</a></li>
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
          if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])>0){

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

            $cartTotal = 0;
            while($row = $select_products_result->fetch_object()) {
              $cartTotal += $row->price;
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
                <p>$
                <?php
                  $quantity = 1;
                  echo "$row->price"*$quantity
                ?>
                </p>
              </td>
              <td class="cart_quantity">
                <div class="text-center"><?php echo $quantity; ?></div>
                <div class="cart_quantity_button">
                  <?php echo "<a href='cart.php?id=$row->productID&name=$row->name&action=quantity_add'> + </a>"; ?>
                  <?php echo "<a href='removefromcart.php?id=$row->productID&name=$row->name' class='cart_quantity_down'> - </a>"; ?>
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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Ready to Checkout?</h3>
			</div>
				<div>
					<div class="total_area">
          <?php
            $eco = 30;
            $shipping = 0;
          ?>
						<ul>
							<li>Cart Sub Total <span>$
              <?php
                if(isset($cartTotal)) {
                  echo $cartTotal;
                } else {
                  $cartTotal = 0;
                  echo $cartTotal;
                }
              ?>
              </span></li>
							<li>Eco Tax <span>$30</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo $cartTotal+$shipping+$eco; ?>  </span></li>
						</ul>

            <a class="btn btn-default check_out" href="shop.php">Continue Shopping</a>
						<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
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
