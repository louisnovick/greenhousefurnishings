<?php
    session_start();
    include("db_connect.php");
    /* set variables */
    $username_exists = false;
    $email_exists = false;
    $passwords_match = false;
    $signup_complete = false;
    /* Statements to check and see if the username or email already exists in the database*/
    $search_user_query = "SELECT * FROM users";
    $search_user_result = $mysqli->query($search_user_query);
    while($row = $search_user_result->fetch_object()) {
        if ($_POST['new_username'] == $row->username) {
            $username_exists = true;
        }
        if ($_POST['new_email'] == $row->email) {
            $email_exists = true;
        }
    }
    /* end username and email check*/
    /*check to see if both passwords from form match*/
    if (isset($_POST['new_password']) && isset($_POST['pass_retype'])) {
        if ($_POST['new_password'] == $_POST['pass_retype']) {
            $passwords_match = true;
        }
    }
    /* end password match*/ 
    /* if form is filled out, username and email don't exist in database, and passwords match, insert data into database*/
    if (isset($_POST['signup_submit'])) { 
        if (isset($_POST['first_name'])
            && $_POST['first_name'] != "" 
            && isset($_POST['last_name'])
            && $_POST['last_name'] != "" 
            && isset($_POST['new_email'])
            && $_POST['new_email'] != "" 
            && isset($_POST['new_username'])
            && $_POST['new_username'] != "" 
            && isset($_POST['new_password'])
            && $_POST['new_password'] != ""
            && $username_exists == false
            && $email_exists == false
            && $passwords_match == true) { 
            $add_user_query = "INSERT INTO users (fName, lName, email, username, password, userAccess)
                                VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['new_email']."', '".$_POST['new_username']."', '".md5($_POST['new_password'])."', 'user')";
            $mysqli->query($add_user_query);
            $signup_complete = true;
        } else {
        }
    }
    /* end credentials insert */
    if ($signup_complete == true) {
        $user_query = "SELECT * FROM users";
            $user_result = $mysqli->query($user_query);
            if($mysqli->error) {
                print "Error: Someone's getting fired.";
            }
            while($row = $user_result->fetch_object()) {
                if((($_POST['new_username']) == ($row->username)) && (md5($_POST['new_password']) == ($row->password))) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['logged_in_user'] = $row->username;
                    $_SESSION['logged_in_user_access'] = $row->userAccess;
                    $_SESSION['logged_in_user_fn'] = $row->fName;
                    $_SESSION['logged_in_user_ln'] = $row->lName;
                    $_SESSION['logged_in_user_email'] = $row->email;
                } else if((($_POST['new_username']) != ($row->username)) && ($_POST['new_password'] != ($row->password))) {
                    $failed_login = true;
                } else {
                    $failed_login = false;
                }
            }
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
</head><!--/head-->

<body>
	<?php include("header.php"); 
          
          if ($signup_complete == true) {
    ?>
    <div>
        <h2>Your account creation was successful!</h2>
        <br>
        <a href="home.php">Home</a>         <a href="shop.php">Shop</a>
    </div>
    <?php
            } else { 
    ?>

    <div class="signup-form"><!--sign up form-->
        <h2>Complete your sign up!</h2>
        <form action="login_complete.php" method="post">
            <input type="text" placeholder="First Name" name="first_name" id="first_name"
                <?php if (isset($_POST['first_name'])) {
                    print("value=\"".$_POST['first_name']."\"");
                } ?> 
            />
            <?php  
                if (isset($_POST['first_name'])) {
                    if ($_POST['first_name'] == "") {
                        print("<span class=\"error\">You must submit a first name.</span>");
                    } else {}
                } else {
                    print("<span class=\"error\">*required</span>");
                }
            ?>
            <input type="text" placeholder="Last Name" name="last_name" id="last_name"
                <?php if (isset($_POST['last_name'])) {
                    print("value=\"".$_POST['last_name']."\"");
                } ?> 
            />
            <?php  
                if (isset($_POST['last_name'])) {
                    if ($_POST['last_name'] == "") {
                        print("<span class=\"error\">You must submit a last name.</span>");
                    } else {}
                } else {
                    print("<span class=\"error\">*required</span>");
                }
            ?>
            <input type="email" placeholder="Email" name="new_email" id="new_email" value="<?php echo $_POST['new_email'] ?>" />
            <?php
                if ($email_exists == true) {
                    print("<span class=\"error\">Email is already in use!</span><br>");
                }
                if (isset($_POST['new_email'])) {
                    if ($_POST['new_email'] == "") {
                        print("<span class=\"error\">You must submit an eMail.</span>");
                    } else {}
                } else {
                    print("<span class=\"error\">*required</span>");
                }
            ?>
            <input type="text" placeholder="New Username" name="new_username" id="new_username" value="<?php echo $_POST['new_username'] ?>" />
            <?php
                if ($username_exists == true) {
                    print("<span class=\"error\">Username is already in use!</span><br>");
                }
                if (isset($_POST['new_username'])) {
                    if ($_POST['new_username'] == "") {
                        print("<span class=\"error\">You must submit a username</span>");
                    } else {}
                } else {
                    print("<span class=\"error\">*required</span>");
                }
            ?>
            <input type="password" placeholder="Password" name="new_password" id="new_password"/>
            <input type="password" placeholder="Retype Password" name="pass_retype" id="pass_retype"/>
            <?php
                if ($passwords_match == false) {
                    print("Passwords must match!<br>");
                }
            ?>
            <button type="submit" name="signup_submit" id="signup_submit" class="btn btn-default">Finish</button>
        </form>

    <?php 
        }
        include("footer.php"); 
    ?>
    


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