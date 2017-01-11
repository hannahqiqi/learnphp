<?php
    $id = $_GET["id"];

    $conn = new mysqli("localhost", "username", "", "test");
    $sql = " DELETE FROM tbd_goods WHERE id = '$id' ";
    $results = $conn->query($sql);

    header("Location: http://localhost:8099/blog/index.php");
