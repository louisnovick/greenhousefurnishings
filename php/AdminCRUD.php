<?php
    //this first section has all of the Read operations
    if($_GET["param"] == "edit"){
        require("../db_connect.php");
        $info = "select * from products where productID = '".$_GET["prod_id"]."'";
        $result = $mysqli->query($info);
        while($row = mysqli_fetch_array($result)){
            echo '
            <form action="#" id="edit-form" role="form">
            	<div class="form-group">
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="sku">SKU: </label>
            				<input type="number" class="form-control" id="sku" value="'.$row["sku"].'">
            			</div>
            			<div class="col-sm-6">
            				<label for="price">Price: </label>
            				<label class="sr-only" for="price">Amount (in dollars)</label>
            			    <div class="input-group">
            			      <div class="input-group-addon">$</div>
            			      <input type="number" class="form-control" id="price" placeholder="Amount" value="'.$row["price"].'">
            			      <div class="input-group-addon">.00</div>
            			      </div>
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-12">
            				<label for="name">Name: </label>
            				<input type="text" class="form-control" id="name" value="'.$row["name"].'">
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-12">
            				<label for="description">Description: </label>
            				<textarea class="form-control" rows="5" id="description">'.$row["description"].'</textarea>
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="type">Type:</label>
            			  	<select class="form-control" id="type">
            			  	  <option value="bookcase">Bookcase</option>
            			  	  <option value="chair">Chair</option>
            				  <option value="dresser">Dresser</option>
            			 	  <option value="lamp">Lamp</option>
            			 	  <option value="sofa">Sofa</option>
            			 	  <option value="table">Table</option>
            				</select>
            			</div>
            			<div class="col-sm-6">
            				<label for="collection">Collection:</label>
            			  	<select class="form-control" id="collection">
            			  	  <option vale="Rustic">Rustic</option>
            			  	  <option value="Modern">Modern</option>
            				  <option value="Vintage">Vintage</option>
            				</select>
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-3">
            				<label for="width">Width (In.): </label>
            				<input type="number" class="form-control" id="width" value="'.$row["width"].'">
            			</div>
            			<div class="col-sm-3">
            				<label for="height">Height (In.): </label>
            				<input type="number" class="form-control" id="height" value="'.$row["height"].'">
            			</div>
            			<div class="col-sm-3">
            				<label for="depth">Depth (In.): </label>
            				<input type="number" class="form-control" id="depth" value="'.$row["depth"].'">
            			</div>
            			<div class="col-sm-3">
            				<label for="weight">Weight (Lbs.): </label>
            				<input type="number" class="form-control" id="weight" value="'.$row["weight"].'">
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="stock">Stock: </label>
            				<input type="number" class="form-control" id="stock" value="'.$row["stock"].'">
            			</div>
            			<div class="col-sm-6">
            				<label for="cost">Cost: </label>
            				<label class="sr-only" for="cost">Amount (in dollars)</label>
            			    <div class="input-group">
            			      <div class="input-group-addon">$</div>
            			      <input type="number" class="form-control" id="cost" placeholder="Amount" value="'.$row["cost"].'">
            			      <div class="input-group-addon">.00</div>
            			    </div>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="image">Full-Size Image:</label>
            				<div class="input-group">
            	                <span class="input-group-btn">
            	                    <span class="btn btn-primary btn-file">
            	                        Browse&hellip; <input type="file" id="imageFS" onchange="StoreFile(this)">
            	                    </span>
            	                </span>
            	                <input type="text" class="form-control" readonly>
            	            </div>
            			</div>
            			<div class="col-sm-6">
            				<label for="image">Thumbnail Image:</label>
            				<div class="input-group">
            	                <span class="input-group-btn">
            	                    <span class="btn btn-primary btn-file">
            	                        Browse&hellip; <input type="file" id="imageTN" onchange="StoreFile(this)">
            	                    </span>
            	                </span>
            	                <input type="text" class="form-control" readonly>
            	            </div>
            			</div>
            		</div>
            	</div>
            </form>
            <span id="productID_'.$row["productID"].'"></span>
            ';
        }
    } 
    else if($_GET["param"] == "new"){
        echo '
        <form action="#" id="add-form" role="form">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-sm-6">
        				<label for="sku">SKU: </label>
        				<input type="number" class="form-control" id="sku">
        			</div>
        			<div class="col-sm-6">
        				<label for="price">Price: </label>
        				<label class="sr-only" for="price">Amount (in dollars)</label>
        			    <div class="input-group">
        			      <div class="input-group-addon">$</div>
        			      <input type="number" class="form-control" id="price" placeholder="Amount">
        			      <div class="input-group-addon">.00</div>
        			      </div>
        			</div>
        		</div>
        		<hr>
        		<div class="row">
        			<div class="col-sm-12">
        				<label for="name">Name: </label>
        				<input type="text" class="form-control" id="name">
        			</div>
        		</div>
        		<hr>
        		<div class="row">
        			<div class="col-sm-12">
        				<label for="description">Description: </label>
        				<textarea class="form-control" rows="5" id="description"></textarea>
        			</div>
        		</div>
        		<hr>
        		<div class="row">
        			<div class="col-sm-6">
        				<label for="type">Type:</label>
        			  	<select class="form-control" id="type">
        			  	  <option value="bookcase">Bookcase</option>
        			  	  <option value="chair">Chair</option>
        				  <option value="dresser">Dresser</option>
        			 	  <option value="lamp">Lamp</option>
        			 	  <option value="sofa">Sofa</option>
        			 	  <option value="table">Table</option>
        				</select>
        			</div>
        			<div class="col-sm-6">
        				<label for="collection">Collection:</label>
        			  	<select class="form-control" id="collection">
        			  	  <option vale="Rustic">Rustic</option>
        			  	  <option value="Modern">Modern</option>
        				  <option value="Vintage">Vintage</option>
        				</select>
        			</div>
        		</div>
        		<hr>
        		<div class="row">
        			<div class="col-sm-3">
        				<label for="width">Width (In.): </label>
        				<input type="number" class="form-control" id="width">
        			</div>
        			<div class="col-sm-3">
        				<label for="height">Height (In.): </label>
        				<input type="number" class="form-control" id="height">
        			</div>
        			<div class="col-sm-3">
        				<label for="depth">Depth (In.): </label>
        				<input type="number" class="form-control" id="depth">
        			</div>
        			<div class="col-sm-3">
        				<label for="weight">Weight (Lbs.): </label>
        				<input type="number" class="form-control" id="weight">
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-sm-6">
        				<label for="stock">Stock: </label>
        				<input type="number" class="form-control" id="stock">
        			</div>
        			<div class="col-sm-6">
        				<label for="cost">Cost: </label>
        				<label class="sr-only" for="cost">Amount (in dollars)</label>
        			    <div class="input-group">
        			      <div class="input-group-addon">$</div>
        			      <input type="number" class="form-control" id="cost" placeholder="Amount">
        			      <div class="input-group-addon">.00</div>
        			    </div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-sm-6">
        				<label for="image">Full-Size Image:</label>
        				<div class="input-group">
        	                <span class="input-group-btn">
        	                    <span class="btn btn-primary btn-file">
        	                        Browse&hellip; <input type="file" id="imageFS" onchange="StoreFile(this)">
        	                    </span>
        	                </span>
        	                <input type="text" class="form-control" readonly>
        	            </div>
        			</div>
        			<div class="col-sm-6">
        				<label for="image">Thumbnail Image:</label>
        				<div class="input-group">
        	                <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse&hellip; <input type="file" id="imageTN" onchange="StoreFile(this)">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
        	            </div>
        			</div>
        		</div>
        	</div>
        </form>
        ';
    } 
    if($_GET["user_param"] == "edit"){
        require("../db_connect.php");
        $info = "select * from users where username = '".$_GET["user"]."'";
        $result = $mysqli->query($info);
        while($row = mysqli_fetch_array($result)){
            echo '
            <form action="#" id="user-edit-form" role="form">
            	<div class="form-group">
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="fName">First Name: </label>
            				<input type="text" class="form-control" id="fName" value="'.$row["fName"].'">
            			</div>
            			<div class="col-sm-6">
            				<label for="lName">Last Name: </label>
            				<input type="text" class="form-control" id="lName" value="'.$row["lName"].'">
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="e-mail">Email: </label>
            				<input type="email" class="form-control" id="e-mail" value="'.$row["email"].'">
            			</div>
            			<div class="col-sm-6">
            				<label for="access">Type:</label>
            			  	<select class="form-control" id="access">
            			  	  <option value="administrative">Admin</option>
            			  	  <option value="privileged">Privileged</option>
            				  <option value="user">Standard User</option>
            				</select>
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="username">Username: </label>
            				<input type="text" class="form-control" id="new-username" value="'.$row["username"].'">
            			</div>
            			<div class="col-sm-6">
            				<label for="password">New Password: </label>
            				<input type="password" class="form-control" id="password">
            			</div>
            		</div>
            	</div>
            </form>
            <span id="old-username_'.$row["username"].'"></span>
            ';
        }
    }
    else if($_GET["user_param"]=="new"){
        echo '
        <form action="#" id="user-edit-form" role="form">
            	<div class="form-group">
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="fName">First Name: </label>
            				<input type="text" class="form-control" id="fName">
            			</div>
            			<div class="col-sm-6">
            				<label for="lName">Last Name: </label>
            				<input type="text" class="form-control" id="lName">
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="e-mail">Email: </label>
            				<input type="email" class="form-control" id="e-mail">
            			</div>
            			<div class="col-sm-6">
            				<label for="access">Type:</label>
            			  	<select class="form-control" id="access">
            			  	  <option value="administrative">Admin</option>
            			  	  <option value="privileged">Privileged</option>
            				  <option value="user">Standard User</option>
            				</select>
            			</div>
            		</div>
            		<hr>
            		<div class="row">
            			<div class="col-sm-6">
            				<label for="username">Username: </label>
            				<input type="text" class="form-control" id="new-username">
            			</div>
            			<div class="col-sm-6">
            				<label for="password">Password:</label>
            				<input type="password" class="form-control" id="password">
            			</div>
            		</div>
            	</div>
            </form>
        ';
    }
    else{
        //all of the actual updating/deleting goes here (checking for 'mode')
        if($_POST["mode"] == "product_edit"){
            include('../db_connect.php');
            if(!$_FILES){
                $q = "update products set 
                        sku='".$_POST["sku"]."', 
                        price='".$_POST["price"]."', 
                        name='".$_POST["name"]."', 
                        description='".$_POST["desc"]."', 
                        width='".$_POST["width"]."', 
                        height='".$_POST["height"]."', 
                        depth='".$_POST["depth"]."', 
                        weight='".$_POST["weight"]."', 
                        type='".$_POST["type"]."', 
                        collection='".$_POST["col"]."', 
                        stock='".$_POST["stock"]."', 
                        cost='".$_POST["cost"]."'
                     where productID = '".$_POST["id"]."'";
            }
            else{
                move_uploaded_file($_FILES['imageFS']['tmp_name'], '../images/fullsize/' .$_POST["type"]."s/" . $_FILES['imageFS']['name']);
                move_uploaded_file($_FILES['imageTN']['tmp_name'], '../images/thumbnails/' .$_POST["type"]."s/" . $_FILES['imageTN']['name']);

                $q = "update products set 
                        sku='".$_POST["sku"]."', 
                        price='".$_POST["price"]."', 
                        name='".$_POST["name"]."', 
                        description='".$_POST["desc"]."', 
                        width='".$_POST["width"]."', 
                        height='".$_POST["height"]."', 
                        depth='".$_POST["depth"]."', 
                        weight='".$_POST["weight"]."', 
                        type='".$_POST["type"]."', 
                        collection='".$_POST["col"]."', 
                        stock='".$_POST["stock"]."', 
                        cost='".$_POST["cost"]."',
                        image_tn='images/thumbnails/".$_POST["type"]."s/".$_POST["imageTNName"]."',
                        image_fs='images/fullsize/".$_POST["type"]."s/".$_POST["imageFSName"]."'
                     where productID = '".$_POST["id"]."'";
            }
            $result = $mysqli->query($q)
            or die($q."<br/><br/>".mysql_error());
            
        }
        else if ($_POST["mode"]=="product_new"){
            include('../db_connect.php');
            if($_FILES){
                move_uploaded_file($_FILES['imageFS']['tmp_name'], '../images/fullsize/' .$_POST["type"]."s/" . $_FILES['imageFS']['name']);
                move_uploaded_file($_FILES['imageTN']['tmp_name'], '../images/thumbnails/' .$_POST["type"]."s/" . $_FILES['imageTN']['name']);
            }
            $q = "insert into products (sku, price, name, description, width, 
                  height, depth, weight, type, collection, stock, cost, feature, image_tn, image_fs)
                  VALUES ('"
                    .$_POST["sku"]."','"
                    .$_POST["price"]."','"
                    .$_POST["name"]."','"
                    .$_POST["desc"]."','"
                    .$_POST["width"]."','"
                    .$_POST["height"]."','"
                    .$_POST["depth"]."','"
                    .$_POST["weight"]."','"
                    .$_POST["type"]."','"
                    .$_POST["col"]."','"
                    .$_POST["stock"]."','"
                    .$_POST["cost"]."','0',
                    'images/thumbnails/" .$_POST["type"]."s/" .$_POST["imageTNName"]."',
                    'images/fullsize/" .$_POST["type"]."s/" .$_POST["imageFSName"]."'
                  )";
            $result = $mysqli->query($q);
            if(!$result){
                //echo "Unable to add new product at this time.\n\nPlease try again later.";
                $result = $mysqli->query($q)
                or die($q."<br/><br/>".mysql_error());
            }
        }
        else if($_POST["mode"] == "user-edit"){
            include('../db_connect.php');
            if($_POST["password"] != "" ){
            $q = "update users set 
                    lName='".$_POST["lName"]."', 
                    fName='".$_POST["fName"]."', 
                    email='".$_POST["email"]."', 
                    userAccess='".$_POST["access"]."', 
                    username='".$_POST["user"]."', 
                    password='".$_POST["password"]."'
                 where username = '".$_POST["id"]."'";
            }
            else{
                $q = "update users set 
                    lName='".$_POST["lName"]."', 
                    fName='".$_POST["fName"]."', 
                    email='".$_POST["email"]."',
                    userAccess='".$_POST["access"]."', 
                    username='".$_POST["user"]."'
                 where username = '".$_POST["id"]."'";
            }
            $result = $mysqli->query($q);
            if(!$result){
                echo mysql_error($result);
            }
        }
        else if ($_POST["mode"]=="user-new"){
            include('../db_connect.php');
            $q = "insert into users (fName, lName, email, password, username, userAccess)
                  VALUES ('"
                    .$_POST["fName"]."','"
                    .$_POST["lName"]."','"
                    .$_POST["email"]."','"
                    .$_POST["password"]."','"
                    .$_POST["user"]."','"
                    .$_POST["access"]."'
                  )";
            $result = $mysqli->query($q);
            if(!$result){
                echo mysql_error($result);
                //echo "Unable to add new user at this time.\n\nPlease try again later.";
            }
        }
        else if($_POST["mode"]=="user-delete"){
            include('../db_connect.php');
            $q = "delete from users where username = '".$_POST["user"]."'";
            $result = $mysqli->query($q);
            if(!$result){
                echo mysql_error($result);
            }
        }
        else if($_POST["mode"]=="product-delete"){
            include('../db_connect.php');
            $q = "delete from products where productID = '".$_POST["id"]."'";
            $result = $mysqli->query($q);
            if(!$result){
                echo mysql_error($result);
            }
        }
    }
?>
