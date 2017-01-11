<?php
$id = $_GET['id'];
$name = $_GET['name'];
$price = $_GET['price'];

$conn = new mysqli("localhost", "username", "", "test");
$sql = " INSERT INTO tbd_goods(name, price) VALUES('$name', $price) ";
$results = $conn->query($sql);

header("Location: http://localhost:8099/blog/index.php");