<?php
    session_start();

    include("db_connect.php");

    require_once '_environment.php';

    function braintree_text_field($label, $name, $result) {
        echo('<div>' . $label . '</div>');
        $fieldValue = isset($result) ? $result->valueForHtmlField($name) : '';
        echo('<div><input type="text" name="' . $name .'" value="' . $fieldValue . '" /></div>');
        $errors = isset($result) ? $result->errors->onHtmlField($name) : array();
        foreach($errors as $error) {
            echo('<div style="color: red;">' . $error->message . '</div>');
        }
        echo("\n");
    }

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
    <link rel="icon" type="image/png" href="favicon.ico">
</head><!--/head-->

<body>
	<?php include("header.php"); ?>

  <?php if(count($_SESSION['cart_items'])>0){

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
        }
      }
    }
    ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="home.php">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="col-sm-12 clearfix">
				<div class="bill-to">
					<?php
        if (isset($_GET["id"])) {
            $result = Braintree_TransparentRedirect::confirm($_SERVER['QUERY_STRING']);
        }
        if (isset($result) && $result->success) { ?>
            <h2>Here is your order information!  Thank you for your purchase!</h2>
            <a href="shop.php">Continue Shopping?</a>
            <?php $transaction = $result->transaction; ?>
            <table class="resultstable">
                <tr><td>Transaction ID</td><td><?php echo htmlentities($transaction->id); ?></td></tr>
                <tr><td>Transaction Status</td><td><?php echo htmlentities($transaction->status); ?></td></tr>
                <tr><td>Transaction Amount</td><td><?php echo htmlentities($transaction->amount); ?></td></tr>
                <tr><td>First Name</td><td><?php echo htmlentities($transaction->customerDetails->firstName); ?></td></tr>
                <tr><td>Last Name</td><td><?php echo htmlentities($transaction->customerDetails->lastName); ?></td></tr>
                <tr><td>Email Address</td><td><?php echo htmlentities($transaction->customerDetails->email); ?></td></tr>
                <tr><td>Credit Card Number</td><td><?php echo htmlentities($transaction->creditCardDetails->maskedNumber); ?></td></tr>
                <tr><td>Expiration Date</td><td><?php echo htmlentities($transaction->creditCardDetails->expirationDate); ?></td></tr>
                <br />
                <tr><td>Amount Paid</td><td>$<?php echo htmlentities($transaction->amount); ?></td></tr>
            </table>
        <?php
        } else {
            if (!isset($result)) { $result = null; } ?>
            <div class="checkout-options">
              <ul class="nav">
                <?php if(!isset($_SESSION['logged_in'])) { ?>
                  <li><a href="login.php"><i class="fa fa-lock"></i>Register Account</a></li>
                  <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                  </li>
                  <?php } else { ?>
                  <li>Thanks for shopping with us <?php print($_SESSION['logged_in_user']) ?></li>
                <?php } ?>

                <li>
                  <a href="cart.php"><i class="fa fa-times"></i>Cancel</a>
                </li>
              </ul>
            </div><!--/checkout-options-->
            <br />
            <br />
            <h1>Please enter your billing information</h1>
            <?php if (isset($result)) { ?>
                <div style="color: red;"><?php echo $result->errors->deepSize(); ?> error(s)</div>
            <?php } ?>
            <form method="POST" action="<?php echo Braintree_TransparentRedirect::url() ?>" autocomplete="off">
                <fieldset>
                    <legend>Basic information</legend>
                    <?php braintree_text_field('First Name', 'transaction[customer][first_name]', $result); ?>
                    <?php braintree_text_field('Last Name', 'transaction[customer][last_name]', $result); ?>
                    <?php braintree_text_field('Email', 'transaction[customer][email]', $result); ?>
                </fieldset>

                <fieldset>
                    <legend>Payment Information</legend>
                    <small class="ccinfo">
                      Credit Card #: 5105105105105100
                      Expiry: 05/2015
                      CVV: 123
                    </small>

                    <?php braintree_text_field('Credit Card Number', 'transaction[credit_card][number]', $result); ?>
                    <?php braintree_text_field('Expiration Date (MM/YY)', 'transaction[credit_card][expiration_date]', $result); ?>
                    <?php braintree_text_field('CVV', 'transaction[credit_card][cvv]', $result); ?>
                </fieldset>

                <?php $tr_data = Braintree_TransparentRedirect::transactionData(
                    array('redirectUrl' => "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),
                    'transaction' => array('amount' => $cartTotal+30, 'type' => 'sale'))) ?>
                <input type="hidden" name="tr_data" value="<?php echo $tr_data ?>" />

                <br />
                <input type="submit" value="Submit" class="cart" />
            </form>
      <div class="table-responsive cart_info container">
        <br />
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
        <?php } ?>
        </div>
      </div>
		</div>
	</section> <!--/#cart_items-->
  <section id="do_action">
    <div class="container">
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
                $shoppingtotal = $cartTotal+$shipping+$eco;
              ?>
              </span></li>
              <li>Eco Tax <span>$30</span></li>
              <li>Shipping Cost <span>Free</span></li>
              <li>Total <span>$<?php echo $shoppingtotal; ?>  </span></li>
            </ul>

            <a class="btn btn-default check_out" href="shop.php">Continue Shopping</a>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
