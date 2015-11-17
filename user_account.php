<?php
    session_start();
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
    <link rel="icon" type="image/png" href="favicon.ico">
</head><!--/head-->

<body>
<?php include("header.php"); ?>
	
<div class="container">
    <div class="col-md-offset-3 col-md-6 accounts category-products">
    	<div class="row">
            <div class="col-md-12">
            	<h2 class="title text-center">Your Account</h2>
            </div>
    	</div>
        <div class="row">
            <div class="col-md-6">
                <h3>First Name:</h3>
                <p class="text-muted"><?php print($_SESSION['logged_in_user_fn']) ?></p>
                <hr>
            </div>
            <div class="col-md-6">
                <h3>Last Name:</h3>
                <p class="text-muted"><?php print($_SESSION['logged_in_user_ln']) ?></p>
                <hr>
            </div>
        </div>
        <div class="row">
         	<div class="col-md-6">
                <h3>Email:</h3>
                <p class="text-muted"><?php print($_SESSION['logged_in_user_email']) ?></p>
                <hr>
			</div>
            <div class="col-md-6">
                <h3>Username:</h3>
                <p class="text-muted"><?php print($_SESSION['logged_in_user']) ?></p>
                <hr>
			</div>
         </div>
     </div>
</div>
	
	
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