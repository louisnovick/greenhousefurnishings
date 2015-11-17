<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";


//$_SESSION['cart_items'][$id][$name]['quantity']++;

if(!isset($_SESSION['cart_items'])){
  $_SESSION['cart_items'] = array();
}

if(array_key_exists($id, $_SESSION['cart_items'])){
  header('Location: cart.php?action=exists&id' . $id . '&name=' . $name);
}

else {
  $_SESSION['cart_items'][$id]=$name;
  header('Location: cart.php?action=added&id' . $id . '&name=' . $name);
}
?>
