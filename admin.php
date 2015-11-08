<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GreenHouseFurniture | Keven Ledee</title>
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
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css" />
    
</head><!--/head-->
<?php include("db_connect.php");
	$select_types = "select distinct type from products";
	$select_collections = "select distinct collection from products";
	$result_types = $mysqli->query($select_types);
	$result_collections = $mysqli->query($select_collections);
?>
<body>

	<!-- Edit Product Modal -->
	<div class="container">
		<div id="edit-product" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <img src="images/ajax-loader.gif" id="ajax-loader" alt="Loading..."/>
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit Product</h4>
		      </div>
		      <div class="modal-body" id="edit-product-modal">
		      <!-- content here is generated through an AJAX callback using AdminCRUD.php-->
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-danger pull-left" onclick="DeleteProduct()">Delete</button>
		      	<button type="submit" class="btn edit-submit submit-btn" id="product_edit">Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div> <!-- end modal -->
	</div>
	
	<!-- Edit User Modal -->
	<div class="container">
		<div id="edit-user" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <img src="images/ajax-loader.gif" id="ajax-loader" alt="Loading..."/>
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit User</h4>
		      </div>
		      <div class="modal-body" id="edit-user-modal">
		      <!-- content here is generated through an AJAX callback using AdminCRUD.php-->
		      </div>
		      <div class="modal-footer">
		      	<button type="button" id="user-delete" class="btn btn-danger pull-left" onclick="DeleteUser()">Delete</button>
		      	<button type="submit" id="user-edit" class="btn edit-submit submit-btn">Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div> <!-- end modal -->
	</div>
	
	<!-- New Product Modal -->
	<div class="container">
		<div id="new-product" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <img src="images/ajax-loader.gif" id="ajax-loader" alt="Loading..."/>
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">New Product</h4>
		      </div>
		      <div class="modal-body" id="new-product-modal">
		      <!-- content here is generated through an AJAX callback using AdminCRUD.php-->
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn edit-submit submit-btn" id="product_new">Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div> <!-- end modal -->
	</div>
	
	<!-- New User Modal -->
	<div class="container">
		<div id="new-user" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <img src="images/ajax-loader.gif" id="ajax-loader" alt="Loading..."/>
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">New User</h4>
		      </div>
		      <div class="modal-body" id="new-user-modal">
		      <!-- content here is generated through an AJAX callback using AdminCRUD.php-->
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="user-new" class="btn edit-submit submit-btn">Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div> <!-- end modal -->
	</div>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 407 371 1234</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@greenhousefurniture.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="home.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">USA</a></li>
								</ul>
							</div>
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php" class="active"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="home.php">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
										<li><a href="product-details.php">Product Details</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<li><a href="login.php" class="active">Login</a></li> 
                                    </ul>
                                </li> 
								
								<li><a href="404.php">404</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="admin-main">
		<div class="container">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#products">Products</a></li>
			  <li><a data-toggle="tab" href="#users">Users</a></li>
			</ul>
		</div>
		<div class="tab-content">
		  <div id="products" class="tab-pane fade in active">
		    <div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4>Type Filter</h4>
						<div class="btn-group" role="group" aria-label="...">
							<?php
								while($row = mysqli_fetch_array($result_types)){
									echo '
	            						<button type="button" class="btn btn-default type-btn">'.ucfirst($row["type"]).'</button>
									';
								}
							?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="pull-right">
							<h4>Collection Filter</h4>
							<div class="btn-group" role="group" aria-label="...">
								<?php
									while($row = mysqli_fetch_array($result_collections)){
										echo '
		            						<button type="button" class="btn btn-default collection-btn">'.ucfirst($row["collection"]).'</button>
										';
									}
								?>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<div class="dat-bottom">
							<button type="button" class="btn btn-default dat-bottom" aria-label="Left Align" data-toggle='modal' data-target='#new-product' onclick="NewProductPrep()">
								<span class="glyphicon glyphicon-plus-sign" style="color:#3C763D" aria-hidden="true"></span> Add New Product
							</button>
						</div>
						
						
						<table id="admin-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
							<thead>
								<tr>
									<th>SKU</th>
									<th>Name</th>
									<th>Type</th>
									<th>Description</th>
									<th>Collection</th>
									<th>Image</th>
									<th>Cost</th>
									<th>Price</th>
									<th># In Stock</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="list_products">
							<?php require("php/list_products.php"); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		  </div>
		  <div id="users" class="tab-pane fade">
		    <div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="dat-bottom">
							<button type="button" class="btn btn-default dat-bottom dat-top" aria-label="Left Align" data-toggle='modal' data-target='#new-user' onclick="NewUserPrep()">
								<span class="glyphicon glyphicon-user" style="color:#3C763D" aria-hidden="true"></span> Add New User
							</button>
						</div>
						
						
						<table id="users-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">
							<thead>
								<tr>
									<th>Last Name</th>
									<th>First Name</th>
									<th>Username</th>
									<th>Email</th>
									<th>Access Level</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="list_users">
							<?php require("php/list_users.php"); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		  </div>
		</div>
		
		
	</section>
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>GREEN</span>-HOUSE</h2>
							<p>Meet our team of professionals behind Green House Furniture.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>John Doe</p>
								<h2>Developer</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Peter Smith</p>
								<h2>Designer</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Jane Doe</p>
								<h2>Merketing</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Janet Smith</p>
								<h2>Finance</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>4000 Central Florida Blvd, Orlando, FL 32816</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Lamps</a></li>
								<li><a href="#">Chairs</a></li>
								<li><a href="#">Sofas</a></li>
								<li><a href="#">Bookcases</a></li>
								<li><a href="#">Tables</a></li>
								<li><a href="#">Dressers</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About GreenHouse Furniture</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Subscribe</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates and deals from <br />GreenHouse Furniture.</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 GreenHouse Furniture. All rights reserved.(This site is not official and is an assignment for a UCF Digital Media course)</p>
					<p class="pull-right">Designed by <span><a target="_blank" href=#>Keven Ledee</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript">
	function ProductInfoCallback(prod_id){
        if(prod_id == "") {
            return;
        } else {
            if(window.XMLHttpRequest){
                var xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("edit-product-modal").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "php/AdminCRUD.php?prod_id="+prod_id+"&param=edit", true);
            xmlhttp.send();
            
        }
    }
    
    function NewProductPrep(){
    	if(window.XMLHttpRequest){
    		var xmlhttp = new XMLHttpRequest();
    	}
    	xmlhttp.onreadystatechange = function(){
    		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
    			document.getElementById("new-product-modal").innerHTML = xmlhttp.responseText;
    		}
    	}
    	xmlhttp.open("GET", "php/AdminCRUD.php?prod_id=0&param=new", true);
    	xmlhttp.send();
    }
    
    function UserInfoCallback(username){
        if(username == "") {
            return;
        } else {
            if(window.XMLHttpRequest){
                var xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("edit-user-modal").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "php/AdminCRUD.php?user="+username+"&user_param=edit", true);
            xmlhttp.send();
            
        }
    }
    
    function NewUserPrep(){
    	if(window.XMLHttpRequest){
    		var xmlhttp = new XMLHttpRequest();
    	}
    	xmlhttp.onreadystatechange = function(){
    		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
    			document.getElementById("new-user-modal").innerHTML = xmlhttp.responseText;
    		}
    	}
    	xmlhttp.open("GET", "php/AdminCRUD.php?user_param=new", true);
    	xmlhttp.send();
    }
    
    function ProductListCallback(){
	    if(window.XMLHttpRequest){
	        var xmlhttp = new XMLHttpRequest();
	    }
	    xmlhttp.onreadystatechange = function(){
	        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	            document.getElementById("list_products").innerHTML = xmlhttp.responseText;
	        }
	    }
	    xmlhttp.open("GET", "php/list_products.php?name=", true);
	    xmlhttp.send();
    }
    
    function DeleteUser(){
    	if(confirm("This user will be permenantly deleted.")){
	    	var user = $("span[id^='old-username']").attr("id").split("_")[1];
	    	$.ajax({
			        type: 'POST',
			        url: 'php/AdminCRUD.php',
			        data: {
			        	mode: "user-delete",
			        	user: user
			        },
			        success: function(data) {
			        	//close the modal
			        	$(".close").click();
			        	//gimme status
			        	//alert(data);
			        },
			        error: function(errorThrown) { 
	        			alert(errorThrown); 
	    			}
	    	});
    	}
    }
    
    function DeleteProduct(){
    	if(confirm("This product will be permenantly deleted.")){
	    	var id = $("span[id^='productID']").attr("id").split("_")[1];
	    	$.ajax({
			        type: 'POST',
			        url: 'php/AdminCRUD.php',
			        data: {
			        	mode: "product-delete",
			        	id: id
			        },
			        success: function(data) {
			        	//close the modal
			        	$(".close").click();
			        	//gimme status
			        	//alert(data);
			        },
			        error: function(errorThrown) { 
	        			alert(errorThrown); 
	    			}
	    	});
    	}
    }
    
   	$(document).ready(function(){
   		//$(".div-desc").css("white-space", "normal");
   		$(".submit-btn").click(function(){
	   		var sku = $("#sku").val();
	    	var price = $("#price").val();
	    	var name = $("#name").val();
	    	var desc = $("#description").val();
	    	var type = $("#type").val();
	    	var col = $("#collection").val();
	    	var width = $("#width").val();
	    	var height = $("#height").val();
	    	var depth = $("#depth").val();
	    	var weight = $("#weight").val();
	    	var stock = $("#stock").val();
	    	var cost = $("#cost").val();
	    	var fName = $("#fName").val();
	    	var lName = $("#lName").val();
	    	var email = $("#e-mail").val();
	    	var user = $("#new-username").val();
	    	var access = $("#access").val();
	    	var password = $("#password").val();
	    	var mode = $(this).attr("id");
	    	var id = 0;
	    	if (mode == "product_edit"){
	    		id = $("span[id^='productID']").attr("id").split("_")[1];
	    	}
	    	else if(mode == "user-edit"){
	    		id = $("span[id^='old-username']").attr("id").split("_")[1];
	    	}
	    	
	    	$.ajax({
		        type: 'POST',
		        url: 'php/AdminCRUD.php',
		        data: {
		        	sku: sku,
		        	price: price,
		        	name: name,
		        	desc: desc,
		        	type: type,
		        	col: col,
		        	width: width,
		        	height: height,
		        	depth: depth,
		        	weight: weight,
		        	stock: stock,
		        	cost: cost,
		        	fName: fName,
		        	lName: lName,
		        	email: email,
		        	user: user,
		        	access: access,
		        	password: password,
		        	id: id,
		        	mode: mode
		        },
		        success: function(data) {
		        	//close the modal
		        	$(".close").click();
		        	//gimme status
		        	//alert(data);
		        },
		        error: function(errorThrown) { 
        			alert(errorThrown); 
    			}       
			});
   		});
   		var prodTable = $('#admin-table').DataTable({
    		renderer: "bootstrap",
        	"bAutoWidth": false
    	});
    	
    	var userTable = $("#users-table").DataTable({
    		renderer: "bootstrap",
    		"bAutoWidth": false
    	})
   	});
    </script>
</body>
</html>