<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

if(!isset($_SESSION['cart_items'])){
  $_SESSION['cart_items'] = array();
}

if(array_key_exists($id, $_SESSION['cart_items'])){
  header('Location: shop.php?action=exists&id' . $id . '&name=' . $name . '&quantity=1');
}

else {
  $_SESSION['cart_items'][$id]=$name;
  header('Location: cart.php?action=added&id' . $id . '&name=' . $name);
}
?>
