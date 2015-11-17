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
    <title>GreenHouseFurniture | Admin</title>
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
    <link rel="icon" type="image/png" href="favicon.ico">
    
</head><!--/head-->
<?php include("db_connect.php");
  $select_types = "select distinct type from products";
  $select_collections = "select distinct collection from products";
  $result_types = $mysqli->query($select_types);
  $result_collections = $mysqli->query($select_collections);
?>
<body>
  <?php include("header.php"); ?>
  
  <?php
    if(isset($_SESSION["logged_in"])){
      if($_SESSION["logged_in_user_access"] == "administrative") 
        $auth = "a";
      else if($_SESSION["logged_in_user_access"] == "privileged")
        $auth = "p";
      else
        $auth = "u";
    }
    else
      $auth = "u";
  if ($auth == "a" || $auth == "p"){ ?>
  <!-- Edit Product Modal -->
  <div class="container">
    <div id="edit-product" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
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
  
  

  <section id="admin-main">
    <div class="container">
      <h2 class="title text-center">Administration Back-Office</h2>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#products">Products</a></li>
        <li><a data-toggle="tab" href="#users">Users</a></li>
      </ul>
    </div>
    <div class="tab-content">
      <div id="products" class="tab-pane fade in active">
        <div class="container">
        <div class="row">
          <div class="col-sm-12">
          <?php if ($_SESSION["logged_in_user_access"] == "administrative") echo  '<div class="dat-bottom dat-top">
              <button type="button" class="btn btn-default dat-bottom" aria-label="Left Align" data-toggle="modal" data-target="#new-product" onclick="NewProductPrep()">
                <span class="glyphicon glyphicon-plus-sign" style="color:#3C763D" aria-hidden="true"></span> Add New Product
              </button>
            </div>
            ';
          ?>
            <table id="admin-table" class="table table-striped table-bordered dt-responsive nowrap">
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
            
            
            <table id="users-table" class="table table-striped table-bordered dt-responsive nowrap">
              <thead>
                <tr>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Access Level</th>
                  <?php if($auth == "a") echo "<th></th>"; ?>
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
  
  <?php }
  
  else {
    include ("404.php");
  }
  
  include("footer.php"); ?>
  


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
                location.reload();
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
                location.reload();
                //gimme status
                //alert(data);
              },
              error: function(errorThrown) { 
                alert(errorThrown); 
            }
        });
      }
    }
    
    String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
  }
    
    function StoreFile(s){
      $(s).parent().parent().next().val($(s).prop("files")[0].name);
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
        var imageFS = 0;
        var imageFSName = 0;
        var imageTN = 0;
        var imageTNName = 0;
        var id = 0;
        if($("#imageFS").prop("files")){
          if($("#imageFS").prop("files").length != 0){  
            var imageFS = $("#imageFS").prop("files")[0];
            var imageFSName = $("#imageFS").prop("files")[0].name;
          }
          if($("#imageTN").prop("files").length != 0){
            var imageTN = $("#imageTN").prop("files")[0];
            var imageTNName = $("#imageTN").prop("files")[0].name;
          }
        }
        if($("#feature").is(":checked")) {
          var feature = "1";  
        } else { var feature = "0"; }
        if (mode == "product_edit"){
          id = $("span[id^='productID']").attr("id").split("_")[1];
        }
        else if(mode == "user-edit"){
          id = $("span[id^='old-username']").attr("id").split("_")[1];
        }
        
        var form_data = new FormData();
        form_data.append('sku', sku);
        form_data.append('price', price);
        form_data.append('name', name);
        form_data.append('desc', desc);
        form_data.append('type', type);
        form_data.append('col', col);
        form_data.append('width', width);
        form_data.append('height', height);
        form_data.append('depth', depth);
        form_data.append('weight', weight);
        form_data.append('stock', stock);
        form_data.append('cost', cost);
        form_data.append('feature', feature);
        form_data.append('fName', fName);
        form_data.append('lName', lName);
        form_data.append('email', email);
        form_data.append('user', user);
        form_data.append('access', access);
        form_data.append('password', password);
        form_data.append('id', id);
        form_data.append('imageFS', imageFS);
        form_data.append('imageFSName', imageFSName);
        form_data.append('imageTN', imageTN);
        form_data.append('imageTNName', imageTNName);
        form_data.append('mode', mode);
        
        $.ajax({
            type: 'POST',
            url: 'php/AdminCRUD.php',
            processData: false,
            contentType: false,
            data: form_data,
            success: function(data) {
              //close the modal
            //$(".close").click();
            location.reload();
            
              /*prodTable.row.add([
                sku, name, type.capitalizeFirstLetter(), desc, col, "<img src='images/thumbnails/"+type+"s/"+imageTNName+"' alt='No Image' />", cost, price, stock, "<span class='edit-icon'><button type='button' class='btn btn-default get' data-toggle='modal' data-target='#edit-product' value='0' onclick='ProductInfoCallback(this.value)'>Edit</button></span>"
              ]).draw(true);*/
            },
              //gimme status
              //alert(data);
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
      });
      
      
      //very silly and bad jquery to fix the datatable width for long descriptions.
      //i'm unable to remove the nowrap class, which is causing the issue but also
      //causing the table to display the correct number of columns in the parent row.
      //This jQuery hack sort of gives the illusion that I implemented it properly. Sorry.
      $(".sorting_1").each(function(){
        $(this).click(function(){
          $(".div-desc").css("display", "none");
          setTimeout(function(){
            $(".div-desc").css("white-space", "normal");
            setTimeout(function(){
              $(".div-desc").css("display", "");
            },1);
          },1); 
        });
      });
    });
    </script>
</body>
</html>