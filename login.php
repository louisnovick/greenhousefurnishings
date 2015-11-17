<?php
	session_start();

	include("db_connect.php");

	$failed_login = false;

	$pattern_username = "/^[a-zA-Z0-9_-]{3,16}$/";
	$pattern_password = "/^[a-zA-Z0-9_-~ @ # $ ^ &]{3,18}$/";

	if(isset($_POST['submit']) && (!isset($_SESSION['logged_in']))) {
		if (preg_match($pattern_username, $_POST['username']) == 1 && preg_match($pattern_password, $_POST['password']) == 1) {
			/*Login query and database retrival. Setting session variables to hold databse information.*/

			$user_query = "SELECT * FROM users";
			$user_result = $mysqli->query($user_query);
			if($mysqli->error) {
				print "Error: Someone's getting fired.";
			}

			while($row = $user_result->fetch_object()) {			
				if((($_POST['username']) == ($row->username)) && (md5($_POST['password']) == ($row->password))) {
					$_SESSION['logged_in'] = true;
					$_SESSION['logged_in_user'] = $row->username;
					$_SESSION['logged_in_user_access'] = $row->userAccess;
					$_SESSION['logged_in_user_fn'] = $row->fName;
					$_SESSION['logged_in_user_ln'] = $row->lName;
					$_SESSION['logged_in_user_email'] = $row->email;
				} else if((($_POST['username']) != ($row->username)) && ($_POST['password'] != ($row->password))) {
					$failed_login = true;
				} else {
					$failed_login = false;
				}
			}	
		} else {
			$failed_login = true;
		}
	}

	if (isset($_SESSION['logged_in'])) {
		header('Location: home.php');
	}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Log in</title>
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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="login.php" method="post">
							<input name="username" id="username" type="text" placeholder="Username" />
							<input name="password" id="password" type="password" placeholder="Password" />
							<?php  
								if (isset($_POST['submit']) && $failed_login == true) {
									echo "<span class=\"error\">Wrong Username or Password</span><br>";
								}
							?>
							<button name="submit" id="submit" type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="login_complete.php" method="post">
							<input type="text" placeholder="New Username" name="new_username" id="new_username"/>
							<input type="email" placeholder="Email" name="new_email" id="new_email" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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