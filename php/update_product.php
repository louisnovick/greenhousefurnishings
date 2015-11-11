<?php
    require('../db_connect.php');
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
    $result = $mysqli->query($q);
    if($result){
        echo "Success";
    }
    else{
        echo "Update Error";
    }
?>