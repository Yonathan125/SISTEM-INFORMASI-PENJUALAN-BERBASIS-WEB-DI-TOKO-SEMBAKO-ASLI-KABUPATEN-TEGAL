<?php

    include '../config.php';
    $id = $_GET['id'];

    $query = "UPDATE users SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if($result !== false) {
        header('Location: kelolapelanggan.php');
        exit;
    }
?>