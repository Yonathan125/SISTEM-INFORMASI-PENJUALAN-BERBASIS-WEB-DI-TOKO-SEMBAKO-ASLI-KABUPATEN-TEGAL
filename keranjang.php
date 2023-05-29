<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Halaman keranjang</title>
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Keranjang</h2>
        <?php include 'admin/alertsuccess.php' ?>
        <div class="row">
            <div class="col-9">
                <table class="table table-bordered">
                    <tr>
                        <td>Gambar</td>
                        <td>Nama Produk</td>
                        <td>Harga</td>
                        <td>Kuantitas</td>
                        <td>Subtotal</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    include "config.php";
                    $userId = $_SESSION['logged_user']['id'];
                    $query = "SELECT pr.gambar, pr.nama_produk, pr.harga, cd.jumlah_barang, pr.id AS produkid, ct.id AS cartid FROM cart ct JOIN cartdetail cd ON ct.id = cd.cart_id JOIN produk pr ON pr.id = cd.produk_id WHERE ct.user_id = $userId";
                    $result = mysqli_query($connection, $query);
                    $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $totalHarga = 0;
                    if ($cart !== null) {
                        do {
                    ?>
                            <tr>
                                <td>
                                    <img width="200px" src="image/<?php echo $cart['gambar'] ?>" alt="Gambar">
                                </td>
                                <td><?php echo $cart['nama_produk'] ?></td>
                                <td><?php echo 'Rp '.number_format($cart['harga'], 0, ',', '.'); ?></td>
                                <td><?php echo $cart['jumlah_barang'] ?></td>
                                <td><?php echo 'Rp '.number_format($cart['jumlah_barang'] * $cart['harga'], 0, ',', '.'); ?></td>
                                <td>
                                    
                                    <a href="actions/hapuskeranjang.php?cartid=<?= $cart['cartid'] ?>&produkid=<?= $cart['produkid'] ?>" class="btn btn-danger" onclick="confirmDelete(event)">Delete</a>
                                </td>
                            </tr>
                    <?php
                            $totalHarga = $totalHarga + ($cart['jumlah_barang'] * $cart['harga']);
                            $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        } while ($cart !== null);
                    }
                    ?>
                </table>
            </div>
            <div class="col-3">
                <div class="mb-4">
                    <a href="listproduk.php" class="btn btn-secondary">Kembali Berbelanja</a>
                </div>
                <table class="table w-100">
                    <tr>
                        <td>Total Harga</td>
                        <td>Rp. <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
                    </tr>
                </table>
                <div class="mt-4">
                    <a href="actions/checkout.php" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/confirmdelete.js"></script>
</body>

</html>