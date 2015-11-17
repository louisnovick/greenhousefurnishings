<?php
    session_start();
    include("db_connect.php");
    /* set variables */
    $username_exists = false;
    $email_exists = false;
    $passwords_match = false;
    $signup_complete = false;

    $pattern_username = "/^[a-zA-Z0-9_-~ @ # $ ^ &]{3,16}$/";
    $pattern_password = "/^[a-zA-Z0-9_-~ @ # $ ^ &]{3,18}$/";
    $pattern_email = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
    $pattern_fname = "/^[a-zA-Z]{1,16}$/";
    $pattern_lname = "/^[a-zA-Z]{1,16}$/";

    $username_requirements_met = false;
    $password_requirements_met = false;
    $email_requirements_met = false;
    $fname_requirements_met = false;
    $lname_requirements_met = false;

    if (isset($_POST['new_username'])) {
        if (preg_match($pattern_username, $_POST['new_username']) == 1) {
            $username_requirements_met = true;
        }
    }
    if (isset($_POST['new_password'])) {
        if (preg_match($pattern_password, $_POST['new_password']) == 1) {
            $password_requirements_met = true;
        }
    }
    if (isset($_POST['first_name'])) {
        if (preg_match($pattern_fname, $_POST['first_name']) == 1) {
            $fname_requirements_met = true;
        }
    }
    if (isset($_POST['last_name'])) {
        if (preg_match($pattern_lname, $_POST['last_name']) == 1) {
            $lname_requirements_met = true;
        }
    }
    if (isset($_POST['new_email'])) {
        if (preg_match($pattern_email, $_POST['new_email']) == 1) {
            $email_requirements_met = true;
        }
    }

    /* Statements to check and see if the username or email already exists in the database*/
    $search_user_query = "SELECT * FROM users";
    $search_user_result = $mysqli->query($search_user_query);
    if ($username_requirements_met == true && $email_requirements_met == true) {
        while($row = $search_user_result->fetch_object()) {
            if ($_POST['new_username'] == $row->username) {
                $username_exists = true;
            }
            if ($_POST['new_email'] == $row->email) {
                $email_exists = true;
            }
        }
    } else {}
    /* end username and email check*/

    /*check to see if both passwords from form match*/
    if ($password_requirements_met == true) {
        if (isset($_POST['new_password']) && isset($_POST['pass_retype'])) {
            if ($_POST['new_password'] == $_POST['pass_retype']) {
                $passwords_match = true;
            }
        }
    }    
    /* end password match*/ 

    /* if form is filled out, username and email don't exist in database, and passwords match, insert data into database*/
    if (isset($_POST['signup_submit'])) { 
        if (isset($_POST['first_name'])
            && $_POST['first_name'] != ""
            && $fname_requirements_met == true
            && isset($_POST['last_name'])
            && $_POST['last_name'] != "" 
            && $lname_requirements_met == true 
            && isset($_POST['new_email'])
            && $_POST['new_email'] != "" 
            && $email_requirements_met == true
            && isset($_POST['new_username'])
            && $_POST['new_username'] != "" 
            && $username_requirements_met == true
            && isset($_POST['new_password'])
            && $_POST['new_password'] != ""
            && $password_requirements_met == true
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
    <link rel="icon" type="image/png" href="favicon.ico">
</head><!--/head-->

<body>
    <?php include("header.php"); 
          
          if ($signup_complete == true) {
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Your account creation was successful!</h2>
            <br>
            <a class="btn btn-default get pull-left" href="home.php">Home</a> 
            <a class="btn btn-default get pull-right" href="shop.php">Shop</a>
        </div>
    </div>    
    <?php
            } else { 
    ?>
	<div class="row">
    <div class="signup-form col-md-6 col-md-offset-3"><!--sign up form-->
        <h2 class="text-center">Complete your sign up!</h2>
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
                    } else if($fname_requirements_met == false) {
                        print("<span class=\"error\">Name does not meet requirements.(No numbers or symbols aloud)</span>");
                    }
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
                    } else if($lname_requirements_met == false) {
                        print("<span class=\"error\">Name does not meet requirements.(No numbers or symbols aloud)</span>");
                    }
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
                    } else if($email_requirements_met == false) {
                        print("<span class=\"error\">Email does not meet requirements.(ex: name@email.com)</span>");
                    }
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
                    } else if($username_requirements_met == false) {
                        print("<span class=\"error\">Username does not meet requirements.(Letters and numbers aloud, can contain: @ # $ ^ &)</span>");
                    }
                } else {
                    print("<span class=\"error\">*required</span>");
                }
            ?>
            <input type="password" placeholder="Password" name="new_password" id="new_password"/>
            <input type="password" placeholder="Retype Password" name="pass_retype" id="pass_retype"/>
            <?php
                if ($passwords_match == false) {
                    print("<span class=\"error\">Passwords must match!</span>");
                }
                if ($password_requirements_met == false) {
                    print("<br><span class=\"error\">Password does not meet requirements.(Password must be 3-18 characters, can contain: @ # $ ^ &)</span>");
                }
            ?>
            <button class="center-block" type="submit" name="signup_submit" id="signup_submit" class="btn btn-default">Finish</button>
        </form>
    </div>
    </div>

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