<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Toko Asli</title>
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        
        <?php
        include 'admin/alertsuccess.php';
        ?>

        <div class="mt-3">
            <div class="row mb-4">
                <a href="listproduk.php" class="btn btn-secondary">Kembali Berbelanja</a>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <td>Order ID</td>
                        <td>Tanggal Pembelian</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>

                    <?php
                        include 'config.php';
                        $userId = $_SESSION['logged_user']['id'];
                        $query = "SELECT * FROM transaksi WHERE user_id = $userId";
                        $result = mysqli_query($connection, $query);
                        $order = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        if($order !== null) {
                            do {
                                $statusTransaksi = 'none';
                                if($order['tanggal_bayar'] === null) {
                                    $statusTransaksi = 'Menunggu Pembayaran';
                                } else if($order['no_resi'] !== null) {
                                    $statusTransaksi = 'Sudah dikirimkan';
                                } else if($order['no_resi'] === null) {
                                    $statusTransaksi = 'Sedang disiapkan';
                                } else if($order['konfirmasi_pembayaran'] === null) {
                                    $statusTransaksi = 'Pembayaran dikonfirmasi';
                                }
                    ?>
                                <tr>
                                    <td><?php echo $order['id']; ?></td>
                                    <td><?php echo $order['tanggal_transaksi']; ?></td>
                                    <td><?php echo $statusTransaksi; ?></td>
                                    <td>
                                        <a href="orderdetail.php?id=<?php echo $order['id']; ?>" class="btn btn-primary">Lihat Detail</a>
                                    </td>
                                </tr>
                    <?php
                                $order = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            } while($order !== null);
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>