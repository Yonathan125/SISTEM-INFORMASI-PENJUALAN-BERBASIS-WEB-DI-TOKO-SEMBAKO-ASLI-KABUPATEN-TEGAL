<?php
    $nama = $_POST['nama'];
    $email = $_POST ['email'];
    if(strpos($email, '@') === false) {
        session_start();
        $_SESSION['pesan_error'] = 'E-mail tidak valid';
        header('Location: ../register.php');
        exit;
    }
    $password = $_POST ['password'];
    if(strlen($password) < 1) {
        header('Location: ../register.php');
        exit;
    }
    $password = md5($password);
    $phone = $_POST ['phone'];
    $address = $_POST ['address'];
    
    include '../config.php';

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($user !== null) {
        header('Location: ../register.php');
        exit;
    }

    $query = "INSERT INTO users (name, email, password, phone, address) VALUES ('$nama', '$email', '$password', '$phone', '$address')";
    
    $result = mysqli_query($connection, $query);
    
    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Register berhasil";
        header('Location: ../login.php');
        exit;
    }
    
    header('Location: ../register.php');
    exit;
    