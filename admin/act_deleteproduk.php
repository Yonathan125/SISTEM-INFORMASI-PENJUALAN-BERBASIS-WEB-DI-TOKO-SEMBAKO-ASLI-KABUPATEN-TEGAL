<?php

    include '../config.php';
    $id = $_GET['id'];

    $query = "UPDATE produk SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if($result !== false) {
        header('Location: produk.php');
        exit;
    }

    header('Location: addproduk.php');
    exit;
?>