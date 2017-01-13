<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];

    $conn = new mysqli("localhost", "username", "", "test");
    $sql = " UPDATE tbd_goods SET name='$name', price=$price WHERE id=$id ";
    $results = $conn->query($sql);

    header("Location: http://localhost:8099/goods/learnphp/index.php");
