<?php


$id = $_GET['id'] ?? '';

if(empty($id)){
redirectToHome('Location: /L24');
die;
}

// $sql = "DELETE FROM pizzas WHERE id = 5";