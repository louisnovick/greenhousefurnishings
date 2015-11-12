 <?php
+
 	session_start();
 
 	include("db_connect.php");
 @@ -16,14 +17,13 @@
 		}
 
 		while($row = $user_result->fetch_object()) {
-			if((($_POST['username']) == ($row->username)) && ($_POST['password'] == ($row->password))) {
+			if((($_POST['username']) == ($row->username)) && (md5($_POST['password']) == ($row->password))) {
 				$_SESSION['logged_in'] = true;
 				$_SESSION['logged_in_user'] = $row->username;
 				$_SESSION['logged_in_user_access'] = $row->userAccess;
 				$_SESSION['logged_in_user_fn'] = $row->fName;
 				$_SESSION['logged_in_user_ln'] = $row->lName;
 				$_SESSION['logged_in_user_email'] = $row->email;
-				$_SESSION['logged_in_user_address'] = $row->shippingAddress;
 			} else if((($_POST['username']) != ($row->username)) && ($_POST['password'] != ($row->password))) {
 				$failed_login = true;
 			} else {
 @@ -52,6 +52,7 @@
     <link href="css/animate.css" rel="stylesheet">
 	<link href="css/main.css" rel="stylesheet">
 	<link href="css/responsive.css" rel="stylesheet">
+	<link href="css/andrew_style.css" rel="stylesheet">
     <!--[if lt IE 9]>
     <script src="js/html5shiv.js"></script>
     <script src="js/respond.min.js"></script>
 @@ -77,7 +78,7 @@
 							<input name="password" id="password" type="password" placeholder="Password" />
 							<?php  
 								if (isset($_POST['submit'])) {
-									echo "<span style=\"color:red;\">Wrong Username or Password</span><br>";
+									echo "<span class=\"error\">Wrong Username or Password</span><br>";
 								}
 							?>
 							<span>
View 142  login_complete.php
 @@ -4,8 +4,8 @@
     /* set variables */
     $username_exists = false;
     $email_exists = false;
-    $form_incomplete = true;
     $passwords_match = false;
+    $signup_complete = false;
 
     /* Statements to check and see if the username or email already exists in the database*/
     $search_user_query = "SELECT * FROM users";
 @@ -21,36 +21,64 @@
     /* end username and email check*/
 
     /*check to see if both passwords from form match*/
-    if ($_POST['new_password'] == $_POST['pass_retype']) {
-        $passwords_match = true;
+    if (isset($_POST['new_password']) && isset($_POST['pass_retype'])) {
+        if ($_POST['new_password'] == $_POST['pass_retype']) {
+            $passwords_match = true;
+        }
     }
     /* end password match*/ 
 
     /* if form is filled out, username and email don't exist in database, and passwords match, insert data into database*/
-    if (isset($_POST['signup_submit']) 
-        && isset($_POST['first_name'])
-        && $_POST['first_name'] != "" 
-        && isset($_POST['last_name'])
-        && $_POST['last_name'] != "" 
-        && isset($_POST['new_email'])
-        && $_POST['new_email'] != "" 
-        && isset($_POST['new_username'])
-        && $_POST['new_username'] != "" 
-        && isset($_POST['new_password'])
-        && $_POST['new_password'] != ""
-        && $username_exists == false
-        && $email_exists == false
-        && $passwords_match == true) {
+    if (isset($_POST['signup_submit'])) { 
+        if (isset($_POST['first_name'])
+            && $_POST['first_name'] != "" 
+            && isset($_POST['last_name'])
+            && $_POST['last_name'] != "" 
+            && isset($_POST['new_email'])
+            && $_POST['new_email'] != "" 
+            && isset($_POST['new_username'])
+            && $_POST['new_username'] != "" 
+            && isset($_POST['new_password'])
+            && $_POST['new_password'] != ""
+            && $username_exists == false
+            && $email_exists == false
+            && $passwords_match == true) { 
 
 
             $add_user_query = "INSERT INTO users (fName, lName, email, username, password, userAccess)
-                                VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['new_email']."', '".$_POST['new_username']."', '".$_POST['new_password']."', 'user')";
+                                VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['new_email']."', '".$_POST['new_username']."', '".md5($_POST['new_password'])."', 'user')";
 
             $mysqli->query($add_user_query);
-    } else {
-        $form_incomplete = true;
+
+            $signup_complete = true;
+
+        } else {
+        }
     }
     /* end credentials insert */
+    if ($signup_complete == true) {
+        $user_query = "SELECT * FROM users";
+            $user_result = $mysqli->query($user_query);
+            if($mysqli->error) {
+                print "Error: Someone's getting fired.";
+            }
+
+            while($row = $user_result->fetch_object()) {
+                if((($_POST['new_username']) == ($row->username)) && (md5($_POST['new_password']) == ($row->password))) {
+                    $_SESSION['logged_in'] = true;
+                    $_SESSION['logged_in_user'] = $row->username;
+                    $_SESSION['logged_in_user_access'] = $row->userAccess;
+                    $_SESSION['logged_in_user_fn'] = $row->fName;
+                    $_SESSION['logged_in_user_ln'] = $row->lName;
+                    $_SESSION['logged_in_user_email'] = $row->email;
+                } else if((($_POST['new_username']) != ($row->username)) && ($_POST['new_password'] != ($row->password))) {
+                    $failed_login = true;
+                } else {
+                    $failed_login = false;
+                }
+            }
+    }
+
 ?> 
 <!DOCTYPE html>
 
 @@ -68,6 +96,7 @@
     <link href="css/animate.css" rel="stylesheet">
 	<link href="css/main.css" rel="stylesheet">
 	<link href="css/responsive.css" rel="stylesheet">
+    <link href="css/andrew_style.css" rel="stylesheet">
     <!--[if lt IE 9]>
     <script src="js/html5shiv.js"></script>
     <script src="js/respond.min.js"></script>
 @@ -80,47 +109,90 @@
 </head><!--/head-->
 
 <body>
-	<?php include("header.php"); ?>
+	<?php include("header.php"); 
+          
+          if ($signup_complete == true) {
+    ?>
+    <div>
+        <h2>Your account creation was successful!</h2>
+        <br>
+        <a href="home.php">Home</a>         <a href="shop.php">Shop</a>
+    </div>
+    <?php
+            } else { 
+    ?>
 
     <div class="signup-form"><!--sign up form-->
         <h2>Complete your sign up!</h2>
         <form action="login_complete.php" method="post">
-            <?php
-                if ($form_incomplete = true) {
-                    print("Must complete form!<br>");
+            <input type="text" placeholder="First Name" name="first_name" id="first_name"
+                <?php if (isset($_POST['first_name'])) {
+                    print("value=\"".$_POST['first_name']."\"");
+                } ?> 
+            />
+            <?php  
+                if (isset($_POST['first_name'])) {
+                    if ($_POST['first_name'] == "") {
+                        print("<span class=\"error\">You must submit a first name.</span>");
+                    } else {}
+                } else {
+                    print("<span class=\"error\">*required</span>");
                 }
             ?>
-            <input type="text" placeholder="First Name" name="first_name" id="first_name" 
-            <?php if (isset($_POST['first_name'])) {
-                print("value=\"".$_POST['first_name']."\"");
-            } ?> />
             <input type="text" placeholder="Last Name" name="last_name" id="last_name"
-            <?php if (isset($_POST['last_name'])) {
-                print("value=\"".$_POST['last_name']."\"");
-            } ?> />
+                <?php if (isset($_POST['last_name'])) {
+                    print("value=\"".$_POST['last_name']."\"");
+                } ?> 
+            />
+            <?php  
+                if (isset($_POST['last_name'])) {
+                    if ($_POST['last_name'] == "") {
+                        print("<span class=\"error\">You must submit a last name.</span>");
+                    } else {}
+                } else {
+                    print("<span class=\"error\">*required</span>");
+                }
+            ?>
             <input type="email" placeholder="Email" name="new_email" id="new_email" value="<?php echo $_POST['new_email'] ?>" />
             <?php
                 if ($email_exists == true) {
-                    print("Email is already in use!<br>");
+                    print("<span class=\"error\">Email is already in use!</span><br>");
+                }
+                if (isset($_POST['new_email'])) {
+                    if ($_POST['new_email'] == "") {
+                        print("<span class=\"error\">You must submit an eMail.</span>");
+                    } else {}
+                } else {
+                    print("<span class=\"error\">*required</span>");
                 }
             ?>
             <input type="text" placeholder="New Username" name="new_username" id="new_username" value="<?php echo $_POST['new_username'] ?>" />
             <?php
                 if ($username_exists == true) {
-                    print("Username is already in use!<br>");
+                    print("<span class=\"error\">Username is already in use!</span><br>");
+                }
+                if (isset($_POST['new_username'])) {
+                    if ($_POST['new_username'] == "") {
+                        print("<span class=\"error\">You must submit a username</span>");
+                    } else {}
+                } else {
+                    print("<span class=\"error\">*required</span>");
                 }
             ?>
             <input type="password" placeholder="Password" name="new_password" id="new_password"/>
             <input type="password" placeholder="Retype Password" name="pass_retype" id="pass_retype"/>
             <?php
                 if ($passwords_match == false) {
-                    print("Passwords do not match!<br>");
+                    print("Passwords must match!<br>");
                 }
             ?>
             <button type="submit" name="signup_submit" id="signup_submit" class="btn btn-default">Finish</button>
         </form>
 
-    <?php include("footer.php"); ?>
+    <?php 
+        }
+        include("footer.php"); 
+    ?>