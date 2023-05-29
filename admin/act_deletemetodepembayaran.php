<?php

    include '../config.php';
    $id = $_GET['id'];

    $query = "UPDATE metodepembayaran SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if($result !== false) {
        header('Location: metodepembayaran.php');
        exit;
    }

    header('Location: addmetodepembayaran.php');
    exit;
?>