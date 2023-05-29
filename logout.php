<?php
session_start();
unset($_SESSION['logged_user']);
$_SESSION['pesan_berhasil'] = "Logout Berhasil";
header('Location: index.php');
?>